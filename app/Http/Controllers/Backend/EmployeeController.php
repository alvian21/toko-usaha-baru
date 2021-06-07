<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all()->where('username','!=',Auth::guard('backend')->user()->username);
        return view("dashboard.employee.index",['employee'=>$employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("dashboard.employee.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:employees,username',
            'password' => 'required|string|min:6|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password'=>'required',
            'role' => 'required'
       ]);

       if($validator->fails()){
           return redirect()->back()->withErrors($validator->errors());
       }else{
            $employee = new Employee();
            $employee->nama = $request->get('nama_lengkap');
            $employee->jenis_kelamin = $request->get('jenis_kelamin');
            $employee->alamat = $request->get('alamat');
            $employee->umur = $request->get('umur');
            $employee->username = $request->get('username');
            $employee->password = bcrypt($request->get('password'));
            $employee->role = $request->get('role');
            $employee->save();

            return redirect()->route('employee.index')->with('alert-success', 'Pegawai berhasil ditambahkan');
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
       $employee= Employee::findOrFail($id);
       return view("dashboard.employee.edit",['employee'=>$employee]);
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
        $validator = Validator::make($request->all(),[
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'password' => 'nullable|string|min:6|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password'=>'min:6|nullable',
            'role' => 'required'
       ]);

       if($validator->fails()){
           return redirect()->back()->withErrors($validator->errors());
       }else{
            $employee = Employee::findOrFail($id);
            $employee->nama = $request->get('nama_lengkap');
            $employee->jenis_kelamin = $request->get('jenis_kelamin');
            $employee->alamat = $request->get('alamat');
            $employee->umur = $request->get('umur');
            if($request->has('password')){
                $employee->password = bcrypt($request->get('password'));
            }
            $employee->role = $request->get('role');
            $employee->save();

            return redirect()->route('employee.index')->with('alert-success', 'Pegawai berhasil diupdate');
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
