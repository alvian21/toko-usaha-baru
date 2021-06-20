<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SafetyStok;

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
        return view('dashboard.safetystok.create', ['item' => $item]);
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
            'barang' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $sfstok = new SafetyStok();
            $sfstok->item_id = $request->get('barang');
            $sfstok->jumlah = $request->get('jumlah');
            $sfstok->keterangan = $request->get('keterangan');
            $sfstok->save();

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
    public function destroy($id)
    {
        //
    }
}
