<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\KehadiranPegawai;
use Illuminate\Http\Request;

class KehadiranPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tableTransaksi.kehadiranPegawai.table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tableTransaksi.kehadiranPegawai.input');
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
     * @param  \App\KehadiranPegawai  $kehadiranPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(KehadiranPegawai $kehadiranPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KehadiranPegawai  $kehadiranPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(KehadiranPegawai $kehadiranPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KehadiranPegawai  $kehadiranPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KehadiranPegawai $kehadiranPegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KehadiranPegawai  $kehadiranPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(KehadiranPegawai $kehadiranPegawai)
    {
        //
    }
}
