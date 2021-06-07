@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Master Pegawai</h4>
                </div>
            </div>
            <form method="POST" action="{{route('employee.update',[$employee->id])}}">
                @include('dashboard.include.alert')
                {{method_field('PUT')}}
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="nama_lengkap" value="{{$employee->nama}}"  placeholder="Nama Pegawai">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L" @if($employee->umur == "L") selected @endif>Laki - laki</option>
                            <option value="P" @if($employee->umur == "P") selected @endif>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Umur</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="number" name="umur" value="{{$employee->umur}}"  placeholder="umur">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="alamat" value="{{$employee->alamat}}"  placeholder="alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" readonly value="{{$employee->username}}" type="text" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Role</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" id="role" name="role">
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
