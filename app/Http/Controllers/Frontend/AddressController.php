<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
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
        return view("frontend.user.address.create");
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
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'nomor_hp' => 'required',
            'utama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {

            $cek = CustomerAddress::where('customer_id', Auth::guard('frontend')->user()->id)->where('utama', 1)->first();
            $add = new CustomerAddress();
            $add->customer_id = Auth::guard('frontend')->user()->id;
            $add->alamat = $request->get('alamat');
            $add->kota = $request->get('input_kota');
            $add->kode_pos = $request->get('kode_pos');
            $add->nomor_telepon = $request->get('nomor_hp');
            $add->provinsi = $request->get('input_provinsi');
            if ($cek && $request->get('utama') == 1) {
                $cek->utama = 0;
                $cek->save();
                $add->utama = $request->get('utama');
            } else {
                $add->utama = $request->get('utama');
            }
            $add->save();

            return redirect()->route('user.index')->with('alert-success', 'alamat berhasil ditambahkan');
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
        $add = CustomerAddress::find($id);

        return view("frontend.user.address.edit", ['add' => $add]);
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
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'nomor_hp' => 'required',
            'utama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {

            $cek = CustomerAddress::where('customer_id', Auth::guard('frontend')->user()->id)->where('utama', 1)->where('id','!=',$id)->first();
            $add = CustomerAddress::find($id);
            $add->alamat = $request->get('alamat');
            $add->kota = $request->get('input_kota');
            $add->kode_pos = $request->get('kode_pos');
            $add->nomor_telepon = $request->get('nomor_hp');
            $add->provinsi = $request->get('input_provinsi');
            if ($cek && $request->get('utama') == 1) {
                $cek->utama = 0;
                $cek->save();
                $add->utama = $request->get('utama');
            } else {
                $add->utama = $request->get('utama');
            }
            $add->save();

            return redirect()->route('user.index')->with('alert-success', 'alamat berhasil diupdate');
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
