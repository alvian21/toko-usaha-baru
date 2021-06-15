<?php

namespace App\Http\Controllers\Backend;

use App\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
       return view('dashboard.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect('/admin/supplier')->with('status', 'Data berhasil ditambah!');
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
    public function edit(Supplier $supplier)
    {
        return view('dashboard.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([

            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',

        ]);

        Supplier::where('id', $supplier->id)->update([

            'nama_pemasok' => $request->nama_pemasok,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,

        ]);

        return redirect('/admin/supplier')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);

        return redirect('/admin/supplier')->with('status', 'Data berhasil dihapus!');
    }
}
