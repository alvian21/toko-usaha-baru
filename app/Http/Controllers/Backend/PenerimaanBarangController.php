<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Reception;
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
        $reception = Reception::all();
        return view('dashboard.reception.index', compact('reception'));
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
     * @param  \App\Reception  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $penerimaanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reception  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $penerimaanBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reception  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reception $penerimaanBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reception  $penerimaanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $penerimaanBarang)
    {
        //
    }
}
