<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function showNotif(){

        $item = DB::table('items')->get();
        $html = "";
        foreach ($item as $i) {

            $safety_stk = DB::table('safety_stoks')
                     ->select('reorder_point')
                     ->where('item_id', '=', $i->id)
                     ->first();

            if($safety_stk){

                if ($safety_stk->reorder_point >= $i->stok ) {

                    $html .= '<li>
                                <a href="/admin/pembelian/create">
                                    <h3>Barang '.$i->nama_barang.'</h3>
                                    <p>Stok Barang '.$i->nama_barang.' tinggal '.$i->stok.', mohon untuk melakukan pembelian barang</p>
                                </a>
                            </li>';
                }
            }
        }

        echo $html;
    }
}
