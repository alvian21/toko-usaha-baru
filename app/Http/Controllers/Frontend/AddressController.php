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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {

            // //provinsi
            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=" . $request->get('provinsi'),
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "GET",
            //     CURLOPT_HTTPHEADER => array(
            //         "key:" . config('app.rajaongkir')
            //     ),
            // ));

            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // $response = json_decode($response, true);
            // $provinsi = $response['rajaongkir']['results'];
            // $provinsi = $provinsi['province'];
            // curl_close($curl);


            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$request->get('kota')."&province=".$request->get('provinsi'),
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "GET",
            //     CURLOPT_HTTPHEADER => array(
            //         "key:" . config('app.rajaongkir')
            //     ),
            // ));

            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // $response = json_decode($response, true);
            // $kota = $response['rajaongkir']['results'];
            // $kota = $kota['city_name'];
            // curl_close($curl);

            // $add = new CustomerAddress();
            // $add->customer_id = Auth::guard('frontend')->user()->id;
            // $add->alamat = $request->get('alamat');
            // $add->kota = $kota;
            // $add->kode_pos = $request->get('kode_pos');
            // $add->nomor_telepon = $request->get('nomor_hp');
            // $add->provinsi = $provinsi;
            // $add->save();

            return redirect()->route('user.index')->with('success', 'alamat berhasil ditambahkan');
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


}
