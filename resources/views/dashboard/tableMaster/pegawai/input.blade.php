@extends('dashboard.main')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Master Pegawai</h4>
            <p class="mb-30"></p>
        </div>
        <div class="pull-right">
            {{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                role="button"><i class="fa fa-code"></i> Source Code</a> --}}
        </div>
    </div>
    <form>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Username">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Role</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Role" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Nama" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Alamat" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Umur</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Umur" type="number" min="1">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Jenis Kelamin" type="text" maxlength="1">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Hp</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Nomor Hp" type="number">
            </div>
        </div>
        <div class="text-center">

            <a href="#" class="btn btn-primary btn-sm" rel="content-y" data-toggle="collapse" role="button">Simpan</a>
        </div>
    </form>

</div>
<!-- Default Basic Forms End -->
@endsection
