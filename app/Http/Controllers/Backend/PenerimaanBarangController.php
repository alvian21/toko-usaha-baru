<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\PenerimaanBarang;
use Illuminate\Http\Request;

class PenerimaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tableTransaksi.penerimaanBarang.table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tableTransaksi.penerimaanBarang.input');
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
     * @param  \App\PenerimaanBarang  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PenerimaanBarang $penerimaanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PenerimaanBarang  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(PenerimaanBarang $penerimaanBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenerimaanBarang  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenerimaanBarang $penerimaanBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenerimaanBarang  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenerimaanBarang $penerimaanBarang)
    {
        //
    }
}
