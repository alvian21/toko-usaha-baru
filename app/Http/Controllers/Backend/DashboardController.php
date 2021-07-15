<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Finance;
use App\SalesTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.index");
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

    public function chartLabarugi(Request $request)
    {
        $totalpen = Finance::where('jenis_keuangan', "=", 'pendapatan')
            ->groupby('jenis_keuangan')->sum('nominal');

        $totalpeng = Finance::where('jenis_keuangan', "=", 'pengeluaran')
            ->groupby('jenis_keuangan')->sum('nominal');
    }

    public function chartPenjualan(Request $request)
    {
        $year = date('Y');
        $online = SalesTransaction::select(DB::raw('DATE_FORMAT(tgl_transaksi, "%m") as tgl_transaksi'), DB::raw('count(*) as total'))->where('status_penjualan', 'online')->whereYear('tgl_transaksi', $year)->groupBy('tgl_transaksi')->get();
        $offline = SalesTransaction::select(DB::raw('DATE_FORMAT(tgl_transaksi, "%m") as tgl_transaksi'), DB::raw('count(*) as total'))->where('status_penjualan', 'offline')->whereYear('tgl_transaksi', $year)->groupBy('tgl_transaksi')->get();

        return response()->json([
            'online' => $online,
            'offline' => $offline
        ]);
    }
}
