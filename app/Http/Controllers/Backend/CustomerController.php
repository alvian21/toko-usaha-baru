<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('dashboard.customer.index', ['customer' => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customer.create');
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
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $customer = new Customer();
            $customer->nama_lengkap = $request->get('nama_lengkap');
            $customer->email = $request->get('email');
            $customer->password = bcrypt($request->get('password'));
            $customer->save();

            return redirect()->route('customer.index')->with('alert-success', 'Customer berhasil ditambahkan');
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
        $customer = Customer::find($id);
        return view('dashboard.customer.edit', ['customer' => $customer]);
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
            'nama_lengkap' => 'required',
            'password' => 'nullable|string|min:6|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password'=>'min:6|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $customer =Customer::find($id);
            $customer->nama_lengkap = $request->get('nama_lengkap');
            if($request->has('password')){
                $customer->password = bcrypt($request->get('password'));
            }
            $customer->save();

            return redirect()->route('customer.index')->with('alert-success', 'Customer berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            $customer = Customer::find($id);
            $customer->delete();

            return response()->json([
                'message' => "true"
            ]);

        }
    }
}
