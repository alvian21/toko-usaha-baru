<?php

namespace App\Http\Controllers\Backend;

use App\DetailTransaction;
use App\Finance;
use App\Http\Controllers\Controller;
use App\Purchase;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Finder;

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
            'nominal' => 'required',
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
            $finance->nominal = $request->nominal;
            $finance->tgl_keuangan = $request->tgl_keuangan;
            $finance->bukti_dokumen = $name;

            $finance->save();
        }else{
            $finance = new Finance();
            $finance->jenis_keuangan = $request->jenis_keuangan;
            $finance->nama_keuangan = $request->nama_keuangan;
            $finance->nominal = $request->nominal;
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
        $request->validate([

            'nama_keuangan' => 'required',
            'jenis_keuangan' => 'required',
            'nominal' => 'required',
            'tgl_keuangan' => 'required',
            'bukti_dokumen' => 'mimes:pdf,doc,docx'
        ]);

        if ($request->hasFile('bukti_dokumen')) {

            $file = $request->file('bukti_dokumen');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/bukti_dokumen", $name);

            Finance::where('id', $finance->id)->update([

                'nama_keuangan' => $request->nama_keuangan,
                'jenis_keuangan' => $request->jenis_keuangan,
                'nominal' => $request->nominal,
                'tgl_keuangan' => $request->tgl_keuangan,
                'bukti_dokumen' => $name,

            ]);
            if($finance->bukti_dokumen != ""){

                unlink(public_path('bukti_dokumen/'. $finance->bukti_dokumen));
            }
        }else{
            Finance::where('id', $finance->id)->update([

                'nama_keuangan' => $request->nama_keuangan,
                'jenis_keuangan' => $request->jenis_keuangan,
                'nominal' => $request->nominal,
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
            if($finance->bukti_dokumen != ""){

                unlink(public_path('bukti_dokumen/'. $finance->bukti_dokumen));
            }

            }else{

                Finance::destroy($finance->id);
            }


        return redirect('/admin/finance')->with('status', 'Data berhasil dihapus!');
    }

    public function showDocument($file){

        //return response()->file(public_path('bukti_dokumen/'.$file));
    }

    public function modalLaporan(Request $request){
        return view('dashboard.finance.indexlap');
    }

    public function periodeLaporan(Request $request)
    {
        $tgl_awal = $request->get('tgl_awal');
        $tgl_akhir = $request->get('tgl_akhir');

        $periode = Finance::whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)->get();$nama_keuanganpen = Finance::select('nama_keuangan')->whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)
        ->where('jenis_keuangan',"=",'pendapatan')
        ->groupby('nama_keuangan')->get();

        $nama_keuanganpen = Finance::select('nama_keuangan')->whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)
        ->where('jenis_keuangan',"=",'pendapatan')
        ->groupby('nama_keuangan')->get();

        $nama_keuanganpeng = Finance::select('nama_keuangan')->whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)
        ->where('jenis_keuangan',"=",'pengeluaran')
        ->groupby('nama_keuangan')->get();


        $pendapatan = Finance::select('nominal')->whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)
        ->where('jenis_keuangan',"=",'pendapatan')
        ->groupby('jenis_keuangan')
        ->groupby('nominal')
        ->get();


        $pengeluaran = Finance::select('nominal')->whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)
        ->where('jenis_keuangan',"=",'pengeluaran')
        ->groupby('jenis_keuangan')
        ->groupby('nominal')
        ->get();

        $totalpen= Finance::whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)
        ->where('jenis_keuangan',"=",'pendapatan')
        ->groupby('jenis_keuangan')->sum('nominal');

        $totalpeng= Finance::whereDate('tgl_keuangan','>=',$tgl_awal)
        ->whereDate('tgl_keuangan','<=',$tgl_akhir)
        ->where('jenis_keuangan',"=",'pengeluaran')
        ->groupby('jenis_keuangan')->sum('nominal');



        return view('dashboard.finance.laporan', ['periode'=>$periode, 'tgl_awal'=>$tgl_awal, 'tgl_akhir'=>$tgl_akhir, 'nama_keuanganpen'=>$nama_keuanganpen,'nama_keuanganpeng'=>$nama_keuanganpeng, 'pendapatan'=>$pendapatan, 'pengeluaran'=>$pengeluaran, 'totalpen'=>$totalpen, 'totalpeng'=>$totalpeng]);
    }

    public function labaRugi(Request $request)
    {

    }
}
