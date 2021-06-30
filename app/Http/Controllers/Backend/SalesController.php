<?php

namespace App\Http\Controllers\Backend;

use App\DetailTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\SafetyStok;
use App\SalesTransaction;
use Illuminate\Support\Facades\Session;
use PDF;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sls_trans = SalesTransaction::where('status_penjualan', '=', 'offline')->get();

        return view('dashboard.sales.index', compact('sls_trans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $items = Item::all();

        $dataBarang = session('data_barang');

        // session()->forget('data_barang');

        $total = 0;

        if($dataBarang){
            foreach ($dataBarang ?? '' as $item) {
                $total += $item['total'];
            }
        }else{
            $dataBarang = [];
        }

        return view('dashboard.sales.create', ['dataBarang' => $dataBarang, 'total' => $total, 'items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $dataBarang = session('data_barang');

        $totalBrg = 0;

        if($dataBarang){
            foreach ($dataBarang ?? '' as $item) {
                $totalBrg += $item['jumlah'];
            }
        }else{
            $dataBarang = [];
        }

        $sls_trans = new SalesTransaction();

        $sls_trans->total_barang = $totalBrg;
        $sls_trans->tgl_transaksi = date('Y-m-d H:i:s');
        $sls_trans->status_penjualan = "offline";

        $sls_trans->save();

        $id_sales = $sls_trans->id;

        foreach ($dataBarang as $item) {
            $sls_detail =  new DetailTransaction();

            $items = DB::table('items')
                         ->select('id')
                         ->where('nama_barang', '=', $item['nama_barang'])
                         ->first();

            $sls_detail->item_id = $items->id;
            $sls_detail->sales_transaction_id = $id_sales;
            $sls_detail->jumlah_barang = $item['jumlah'];
            $sls_detail->nama_barang = $item['nama_barang'];
            $sls_detail->harga = $item['harga'];

            $sls_detail->save();

            $stok = DB::table('items')
                         ->select('stok')
                         ->where('id', '=', $sls_detail->item_id)
                         ->first();

            Item::where('id', $sls_detail->item_id)->update([
                'stok' => $stok->stok - $item['jumlah']
            ]);

            $cekItem = SafetyStok::where('item_id', '=', $sls_detail->item_id)->first();

            if($cekItem){
                $bulanlalu = date('m', strtotime('-1 months'));

            $max_sales = DB::table('detail_transactions as dt')
                            ->join('sales_transactions as st', 'dt.sales_transaction_id','=','st.id')
                            ->where('item_id', '=', $sls_detail->item_id)
                            ->whereMonth('st.tgl_transaksi', '=', $bulanlalu)
                            ->max('jumlah_barang');

            $avg_sales = DB::table('detail_transactions as dt')
                            ->join('sales_transactions as st', 'dt.sales_transaction_id','=','st.id')
                            ->where('item_id', '=', $sls_detail->item_id)
                            ->whereMonth('st.tgl_transaksi', '=', $bulanlalu)
                            ->avg('jumlah_barang');

            $avg_rop = DB::table('detail_transactions as dt')
                            ->join('sales_transactions as st', 'dt.sales_transaction_id','=','st.id')
                            ->where('item_id', '=', $sls_detail->item_id)
                            ->whereMonth('st.tgl_transaksi', '=', $bulanlalu)
                            ->avg('jumlah_barang');

            $idSup = DB::table('safety_stoks')
                            ->select('supplier_id')
                            ->where('item_id', '=', $sls_detail->item_id)
                            ->first();

            $lead_time = DB::table('suppliers')
                            ->select('lead_time')
                            ->where('id', '=', $idSup->supplier_id)
                            ->first();

            $safety_stok = ($max_sales - $avg_sales) * $lead_time->lead_time;

            $rop = $avg_rop * $lead_time->lead_time + $safety_stok;

                SafetyStok::where('item_id', $sls_detail->item_id)->update([

                    'jumlah' => $safety_stok,
                    'reorder_point' => $rop,
                ]);
            }
        }

        session(['status' => 'Data Berhasil Dimasukkan!']);

        $url = "http://127.0.0.1:8000/admin/sales/cetak-struk";
        $urlcr = "/admin/sales";
        echo "<script>window.open('".$url."', '_blank')
        setTimeout(function(){location.href='".$urlcr."'; }, 2000);
        </script>";

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addList(Request $request){

        $request->validate([

            'id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $items = DB::table('items')
                     ->select('nama_barang')
                     ->where('id', '=', $request->id)
                     ->first();

        $daftarBarang = [
            'id' => $request->id,
            'nama_barang' => $items->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->total
        ];

        $listBarang = [];

        if(session()->has('data_barang')){

            $dataBarang = session('data_barang');

            foreach ($dataBarang as $item) {
                if($item['id'] == $request->id){
                    return redirect('/admin/sales/create')->with('status', 'Data sudah ada di daftar!');
                }else{

                    array_push($listBarang, $item);
                }
            }
            array_push($listBarang, $daftarBarang);
        }else{
            array_push($listBarang, $daftarBarang);
        }

        session(['data_barang' => $listBarang]);

        return redirect('/admin/sales/create');
    }

    public function deleteBarang($id){
        $dataBarang = session('data_barang');

        $barangUpdate = [];

        foreach ($dataBarang as $item) {
            if($id == $item['id']){

                unset($item);

            }else{
                array_push($barangUpdate, $item);
            }
        }

        session(['data_barang' => $barangUpdate]);

        return redirect('/admin/sales/create');
    }

    public function getHarga($id){

        $items = DB::table('items')
                     ->select('harga_jual')
                     ->where('id', '=', $id)
                     ->first();

        return $items->harga_jual;
    }

    public function updateMinus($id){

        $dataBarang = session('data_barang');

        $barangUpdate = [];

        foreach ($dataBarang as $item) {

            if($id == $item['id']){

                $item['jumlah'] = $item['jumlah'] - 1;
                $item['total'] = $item['jumlah'] * $item['harga'];
                array_push($barangUpdate, $item);
            }else{
                array_push($barangUpdate, $item);
            }

        }

        session(['data_barang' => $barangUpdate]);

        $brg = session('data_barang');

        $total = 0;

        if($brg){
            foreach ($brg ?? '' as $item) {
                $total += $item['total'];
            }
        }else{
            $brg = [];
        }

        return $total;
    }

    public function updatePlus($id){

        $dataBarang = session('data_barang');

        $barangUpdate = [];

        foreach ($dataBarang as $item) {

            if($id == $item['id']){

                $item['jumlah'] = $item['jumlah'] + 1;
                $item['total'] = $item['jumlah'] * $item['harga'];
                array_push($barangUpdate, $item);
            }else{
                array_push($barangUpdate, $item);
            }

        }

        session(['data_barang' => $barangUpdate]);

        $brg = session('data_barang');

        $total = 0;

        if($brg){
            foreach ($brg ?? '' as $item) {
                $total += $item['total'];
            }
        }else{
            $brg = [];
        }

        return $total;
    }

    public function getTotal(){

        $dataBarang = session('data_barang');

        // session()->forget('data_barang');

        $total = 0;

        if($dataBarang){
            foreach ($dataBarang ?? '' as $item) {
                $total += $item['total'];
            }
        }else{
            $dataBarang = [];
        }

        return $total;
    }

    public function getDetail($id){

        $items = DB::table('detail_transactions')
                         ->select('nama_barang', 'jumlah_barang', 'harga', DB::raw('jumlah_barang * harga as total'))
                         ->where('sales_transaction_id', '=', $id)
                         ->get();

        return response()->json($items);

    }

    public function getStruk(){

        $dataBarang = session('data_barang') ?? [];
        $ldate = date('Y-m-d');
        $total = 0;

        if($dataBarang){
            foreach ($dataBarang ?? '' as $item) {
                $total += $item['total'];
            }
        }else{
            $dataBarang = [];
        }

        $pdf = PDF::loadview('dashboard.sales.struk', ['dataBarang' => $dataBarang, 'date' => $ldate, 'total' => $total]);
        session()->forget('data_barang');

        return $pdf->stream();
    }


}
