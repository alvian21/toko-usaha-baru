<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalesTransaction;
use Illuminate\Support\Facades\Validator;
use App\DetailTransaction;
use App\Item;

class OnlineSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = SalesTransaction::all()->where('status_penjualan', 'online');
        return view('dashboard.onlinesales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DetailTransaction::where('sales_transaction_id', $id)->get();
        $sales = SalesTransaction::find($id);
        $item = Item::all();

        return view('dashboard.onlinesales.show', ['order' => $order, 'item' => $item, 'sales' => $sales]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = SalesTransaction::find($id);
        return view('dashboard.onlinesales.edit', ['sales' => $sales]);
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
       $validator = Validator::make($request->all(),[
        'no_resi' => 'nullable|string',
        'status' => 'required',
        'status_pembayaran' => 'required',
        'ongkir' => 'nullable',
        'jasa' => 'required'
       ]);

       if($validator->fails()){
           return redirect()->back()->withErrors($validator->errors());
       }else{
           $sales = SalesTransaction::find($id);
           $sales->no_resi = $request->get('no_resi');
           $sales->status = $request->get('status');
           $sales->status_pembayaran = $request->get('status_pembayaran');
           $sales->ongkir = $request->get('ongkir');
           $sales->jasa = $request->get('jasa');
           $sales->save();

           return redirect()->route('onlinesales.index')->with('alert-success','Penjualan online berhasil di update');
       }
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
}
