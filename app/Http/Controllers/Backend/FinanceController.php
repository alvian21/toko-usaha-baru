<?php

namespace App\Http\Controllers\Backend;

use App\Finance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finance = Finance::all();
       return view('dashboard.finance.index', compact('finance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.finance.create');
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

            'nama_keuangan' => 'required',
            'jenis_keuangan' => 'required',
            'tgl_keuangan' => 'required',
            'bukti_dokumen' => 'mimes:pdf,doc,docx'
        ]);

        if ($request->hasFile('bukti_dokumen')) {

            $file = $request->file('bukti_dokumen');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/bukti_dokumen", $name);

            $finance = new Finance();
            $finance->jenis_keuangan = $request->jenis_keuangan;
            $finance->nama_keuangan = $request->nama_keuangan;
            $finance->tgl_keuangan = $request->tgl_keuangan;
            $finance->bukti_dokumen = $name;

            $finance->save();
        }else{
            $finance = new Finance();
            $finance->jenis_keuangan = $request->jenis_keuangan;
            $finance->nama_keuangan = $request->nama_keuangan;
            $finance->tgl_keuangan = $request->tgl_keuangan;
            $finance->bukti_dokumen = "";

            $finance->save();
        }

        return redirect('/admin/finance')->with('status', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        return view('dashboard.finance.edit', compact('finance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        if ($request->hasFile('bukti_dokumen')) {

            $file = $request->file('bukti_dokumen');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/bukti_dokumen", $name);

            Finance::where('id', $finance->id)->update([

                'nama_keuangan' => $request->nama_keuangan,
                'jenis_keuangan' => $request->jenis_keuangan,
                'tgl_keuangan' => $request->tgl_keuangan,
                'bukti_dokumen' => $name,

            ]);
            unlink(public_path('bukti_dokumen/'. $finance->bukti_dokumen));
        }else{
            Finance::where('id', $finance->id)->update([

                'nama_keuangan' => $request->nama_keuangan,
                'jenis_keuangan' => $request->jenis_keuangan,
                'tgl_keuangan' => $request->tgl_keuangan,

            ]);
        }

        return redirect('/admin/finance')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        if(file_exists(public_path('bukti_dokumen/'. $finance->bukti_dokumen))){

            Finance::destroy($finance->id);
            unlink(public_path('bukti_dokumen/'. $finance->bukti_dokumen));

            }else{

                Finance::destroy($finance->id);
            }


        return redirect('/admin/finance')->with('status', 'Data berhasil dihapus!');
    }

    public function showDocument($file){

        return response()->file(public_path('bukti_dokumen/'.$file));
    }
}
