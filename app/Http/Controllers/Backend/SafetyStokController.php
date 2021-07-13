<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SafetyStok;
use App\Supplier;
use Illuminate\Support\Facades\DB;

class SafetyStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $safety = SafetyStok::all();
        return view("dashboard.safetystok.index", ['safety' => $safety]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item  = Item::all();
        $supplier = Supplier::all();

        return view('dashboard.safetystok.create', ['item' => $item, 'supplier' => $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier' => 'required',
            'barang' => 'required',
            'jumlah' => 'required',
            'rop' => 'required',
            'keterangan' => 'nullable'
        ]);

        $ss = SafetyStok::where('item_id', '=', $request->get('barang'))->first();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {

            if($ss){
                return redirect()->route('safetystok.create')->with('alert-danger', 'Data Tidak berhasil disimpan, Karena Data Sudah Ada!');
            }else{
                $sfstok = new SafetyStok();
                $sfstok->supplier_id = $request->get('supplier');
                $sfstok->item_id = $request->get('barang');
                $sfstok->jumlah = $request->get('jumlah');
                $sfstok->reorder_point = $request->get('rop');
                $sfstok->keterangan = $request->get('keterangan');
                $sfstok->save();
            }


            return redirect()->route('safetystok.index')->with('alert-success', 'Safety stok berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item  = Item::all();
        $safety = SafetyStok::find($id);
        $supplier = Supplier::all();
        return view('dashboard.safetystok.edit', ['item' => $item, 'safety' => $safety]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'barang' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $sfstok = SafetyStok::find($id);
            $sfstok->item_id = $request->get('barang');
            $sfstok->jumlah = $request->get('jumlah');
            $sfstok->keterangan = $request->get('keterangan');
            $sfstok->save();

            return redirect()->route('safetystok.index')->with('alert-success', 'Safety stok berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            $customer = SafetyStok::find($id);
            $customer->delete();

            return response()->json([
                'message' => "true"
            ]);

        }
    }

    public function getSafetyStok(Request $request){

        $bulanlalu = date('m', strtotime('-1 months'));

        $max_sales = DB::table('detail_transactions as dt')
                        ->join('sales_transactions as st', 'dt.sales_transaction_id','=','st.id')
                        ->where('item_id', '=', $request->get('idBarang'))
                        ->whereMonth('st.tgl_transaksi', '=', $bulanlalu)
                        ->max('jumlah_barang');

        $avg_sales = DB::table('detail_transactions as dt')
                        ->join('sales_transactions as st', 'dt.sales_transaction_id','=','st.id')
                        ->where('item_id', '=', $request->get('idBarang'))
                        ->whereMonth('st.tgl_transaksi', '=', $bulanlalu)
                        ->avg('jumlah_barang');

        $lead_time = DB::table('suppliers')
                        ->select('lead_time')
                        ->where('id', '=', $request->get('idSupplier'))
                        ->first();

        $safety_stok = ($max_sales - $avg_sales) * $lead_time->lead_time;

        $rop = ($avg_sales * $lead_time->lead_time) + $safety_stok;

        return response()->json([
            "ss" => round($safety_stok),
            "rop" => round($rop),
            "max_sls" => $max_sales,
            "avg_sales" => $avg_sales,
            "lead_time" => $lead_time->lead_time
        ]);

    }


}
