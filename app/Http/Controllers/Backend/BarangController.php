<?php

namespace App\Http\Controllers\Backend;
use App\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('dashboard.barang.create');
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

            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/item_images", $name);

            $item = new Item();
            $item->nama_barang = $request->nama_barang;
            $item->harga = $request->harga;
            $item->gambar = $name;
            $item->stok = $request->stok;
            $item->save();

        }else{
            $item = new Item();
            $item->nama_barang = $request->nama_barang;
            $item->harga = $request->harga;
            $item->gambar = "";
            $item->stok = $request->stok;

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
        return view('dashboard.barang.edit', compact('item'));
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
        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/item_images", $name);

            Item::where('id', $item->id)->update([

                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'gambar' => $name,

            ]);
            unlink(public_path('item_images/'. $item->gambar));
        }else{
            Item::where('id', $item->id)->update([

                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,

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
        if(file_exists(public_path('item_images/'. $item->gambar))){

            Item::destroy($item->id);
            unlink(public_path('item_images/'. $item->gambar));

        }else{

            Item::destroy($item->id);
        }


        return redirect('/admin/item')->with('status', 'Data berhasil dihapus!');
    }
}
