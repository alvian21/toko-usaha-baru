<?php

namespace App\Http\Controllers\Backend\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalesTransaction;
use PDF;
use Illuminate\Support\Facades\DB;

class PenjualanTerlarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.output.penjualanterlaris.index");
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

    public function Cetak(Request $request)
    {

        $status = $request->get('transaksi');
        $periode1 = $request->get('periode1');
        $periode2 = $request->get('periode2');
        if ($status == 'semua') {
            $penjualan = SalesTransaction::select('item_id','nama_barang',DB::raw('sum(total_barang) as total'))->rightJoin('detail_transactions','sales_transactions.id','detail_transactions.sales_transaction_id')->whereDate('tgl_transaksi', '>=', $periode1)->whereDate('tgl_transaksi', '<=', $periode2)->groupBy('item_id','nama_barang')->get();
        } else {
            $penjualan = SalesTransaction::select('item_id','nama_barang',DB::raw('sum(total_barang) as total'))->rightJoin('detail_transactions','sales_transactions.id','detail_transactions.sales_transaction_id')->where('status_penjualan', $status)->whereDate('tgl_transaksi', '>=', $periode1)->whereDate('tgl_transaksi', '<=', $periode2)->get();
        }

        // dd($penjualan);
        $periode1 = date("l, F j, Y", strtotime($periode1));
        $periode2 = date("l, F j, Y", strtotime($periode2));
        $pdf = PDF::loadview("dashboard.output.penjualanterlaris.pdf", [
            'penjualan' => $penjualan,
            'periode1' => $periode1,
            'periode2' => $periode2
        ])->setPaper('a4', 'potrait');
        return $pdf->stream('laporan-penjualan-terlaris-pdf', array('Attachment' => 0));
    }

}
