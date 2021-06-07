@extends('dashboard.main')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Kehadiran Pegawai</h4>
            <p class="mb-30"></p>
        </div>
        <div class="pull-right">
            {{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                role="button"><i class="fa fa-code"></i> Source Code</a> --}}
        </div>
    </div>
    <form>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Pegawai ID</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12">
                    <option selected="">Choose...</option>
                    <option value="1">P01</option>
                    <option value="2">P02</option>
                    <option value="3">P03</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam Masuk</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Role" type="time">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam Pulang</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Role" type="time">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Hadir</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date">
            </div>
        </div>

        <div class="text-center">

            <a href="#" class="btn btn-primary btn-sm" rel="content-y" data-toggle="collapse" role="button">Simpan</a>
        </div>
    </form>

</div>
<!-- Default Basic Forms End -->
@endsection
