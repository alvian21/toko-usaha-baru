<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Customer;

class AuthController extends Controller
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

    public function getLogin()
    {
        if (Auth::guard('frontend')->check()) {
            // return redirect()->route("employee.index");
        }
        return view("auth.frontend.login");
    }

    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {

            if (Auth::guard('frontend')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                // return redirect()->route("employee.index");
            } else {
                return redirect()->back()->withErrors(['Password atau email salah']);
            }
        }
    }

    public function getRegister()
    {
        return view("auth.frontend.register");
    }

    public function postRegister(Request $request)
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

            return redirect()->route('customer.getlogin')->with('alert-success', 'Berhasil mendaftar');
        }
    }

    public function logout()
    {
        Auth::guard('frontend')->logout();

        return redirect("/");
    }
}
