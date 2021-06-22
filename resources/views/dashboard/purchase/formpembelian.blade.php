@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <!-- basic table  Start -->
        <div class="card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-right">
                    <a href="" class="btn btn-primary btn-sm scroll-click" type="button">Kirim</a>
                </div>
            </div>
            <div class="pb-20">
                <form action="" method="">
                    @csrf
                    <div>
                        <h4 class="text-blue h4">
                            <center>Form Pembelian Barang</center>
                        </h4>
                        <h4 class="text-blue h4">
                            <center>Toko Usaha Baru</center>
                        </h4>
                        <p class="text-blue h4">
                            <center>Tanggal : </center>
                        </p>
                    </div>
                    <div class="form-group mt-3 row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" name="item_name">
                        </div>
                    </div>
                    <div class="form-group mt-3 row">
                        <label class="col-sm-12 col-md-2 col-form-label">Jumlah Barang</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" name="jumlah">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection