<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use App\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Item::all();
        return view('dashboard.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Categories::all();
        return view('dashboard.barang.create', ['kategori' => $kategori]);
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
            'kategori' => 'required',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'deskripsi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/item_images", $name);

            $item = new Item();
            $item->category_id = $request->kategori;
            $item->nama_barang = $request->nama_barang;
            $item->kategori = $request->kategori;
            $item->harga_jual = $request->harga_jual;
            $item->harga_beli = $request->harga_beli;
            $item->gambar = $name;
            $item->stok = $request->stok;
            $item->deskripsi = $request->deskripsi;
            $item->save();
        } else {
            $item = new Item();
            $item->category_id = $request->kategori;
            $item->nama_barang = $request->nama_barang;
            $item->kategori = $request->kategori;
            $item->harga_jual = $request->harga_jual;
            $item->harga_beli = $request->harga_beli;
            $item->gambar = "";
            $item->stok = $request->stok;
            $item->deskripsi = $request->deskripsi;

            $item->save();
        }
        return redirect('/admin/item')->with('status', 'Data berhasil ditambah!');
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
    public function edit(Item $item)
    {
        $kategori = Categories::all();

        return view('dashboard.barang.edit', compact('kategori','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'deskripsi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/item_images", $name);

            Item::where('id', $item->id)->update([

                'category_id' => $request->kategori,
                'nama_barang' => $request->nama_barang,
                'harga_jual' => $request->harga_jual,
                'harga_beli' => $request->harga_beli,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                'gambar' => $name,

            ]);
            if ($item->gambar != "") {

                unlink(public_path('item_images/' . $item->gambar));
            }
        } else {
            Item::where('id', $item->id)->update([
                'category_id' => $request->kategori,
                'nama_barang' => $request->nama_barang,
                'harga_jual' => $request->harga_jual,
                'harga_beli' => $request->harga_beli,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect('/admin/item')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if (file_exists(public_path('item_images/' . $item->gambar))) {

            Item::destroy($item->id);
            if ($item->gambar != "") {

                unlink(public_path('item_images/' . $item->gambar));
            }
        } else {

            Item::destroy($item->id);
        }


        return redirect('/admin/item')->with('status', 'Data berhasil dihapus!');
    }
}
