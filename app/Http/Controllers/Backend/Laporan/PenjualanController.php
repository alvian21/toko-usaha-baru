<?php

namespace App\Http\Controllers\Backend\Laporan;

use App\DetailTransaction;
use App\Http\Controllers\Controller;
use App\Penjualan;
use Illuminate\Http\Request;
use App\SalesTransaction;
use PDF;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.output.penjualan.index');
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
            $penjualan = SalesTransaction::whereDate('tgl_transaksi', '>=', $periode1)->whereDate('tgl_transaksi', '<=', $periode2)->get();
        } else {
            $penjualan = SalesTransaction::where('status_penjualan', $status)->whereDate('tgl_transaksi', '>=', $periode1)->whereDate('tgl_transaksi', '<=', $periode2)->get();
        }

        // $arr = [];
        // foreach ($penjualan as $key => $value) {
        //     $detail = DetailTransaction::where('sales_transaction_id', $value->id)->get();
        //     $totalbayar = 0;
        //     foreach ($detail as $key => $row) {
        //        $totalbayar += $row->jumlah_barang * $row->harga;

        //     }
        //     $x['totalbayar'] = $totalbayar;
        //     $value = json_decode(json_encode($value), true);
        //     $data = array_merge((array)$value, $x);
        //     array_push($arr,(Object) $data);
        // }

        // $penjualan = $arr;
        $periode1 = date("l, F j, Y", strtotime($periode1));
        $periode2 = date("l, F j, Y", strtotime($periode2));
        $pdf = PDF::loadview("dashboard.output.penjualan.pdf", [
            'penjualan' => $penjualan,
            'periode1' => $periode1,
            'periode2' => $periode2
        ])->setPaper('a3', 'landscape');
        return $pdf->stream('laporan-penjualan-pdf', array('Attachment' => 0));
    }


    public function CetakDetail(Request $request)
    {

        $status = $request->get('transaksi');
        $periode1 = $request->get('periode1');
        $periode2 = $request->get('periode2');
        if ($status == 'semua') {
            $penjualan = SalesTransaction::whereDate('tgl_transaksi', '>=', $periode1)->whereDate('tgl_transaksi', '<=', $periode2)->get();
        } else {
            $penjualan = SalesTransaction::where('status_penjualan', $status)->whereDate('tgl_transaksi', '>=', $periode1)->whereDate('tgl_transaksi', '<=', $periode2)->get();
        }
        $periode1 = date("l, F j, Y", strtotime($periode1));
        $periode2 = date("l, F j, Y", strtotime($periode2));
        $pdf = PDF::loadview("dashboard.output.penjualan.detail.pdf", [
            'penjualan' => $penjualan,
            'periode1' => $periode1,
            'periode2' => $periode2
        ])->setPaper('a3', 'landscape');
        return $pdf->stream('laporan-penjualan-pdf', array('Attachment' => 0));
    }
}
