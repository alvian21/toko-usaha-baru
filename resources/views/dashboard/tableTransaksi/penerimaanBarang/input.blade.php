@extends('dashboard.main')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Penerimaan Barang</h4>
            <p class="mb-30"></p>
        </div>
        <div class="pull-right">
            {{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                Jumlah="button"><i class="fa fa-code"></i> Source Code</a> --}}
        </div>
    </div>
    <form>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Barang ID</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12">
                    <option selected="">Choose...</option>
                    <option value="1">B01</option>
                    <option value="2">B02</option>
                    <option value="3">B03</option>
                </select>
            </div>
        </div>
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
            <label class="col-sm-12 col-md-2 col-form-label">Safety Stok ID</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12">
                    <option selected="">Choose...</option>
                    <option value="1">SS01</option>
                    <option value="2">SS02</option>
                    <option value="3">SS03</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Jumlah" type="number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Total Harga</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Total Harga" type="number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Pembelian</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Tanggal Pembelian" type="date">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Bukti Nota</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Bukti Nota" type="file">
            </div>
        </div>
        <div class="text-center">

            <a href="#" class="btn btn-primary btn-sm" rel="content-y" data-toggle="collapse" Jumlah="button">Simpan</a>
        </div>
    </form>

</div>
<!-- Default Basic Forms End -->
@endsection
