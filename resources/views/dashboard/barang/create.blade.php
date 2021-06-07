@extends('dashboard.main')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Tambah Master Barang</h4>
                    </div>
                </div>
                <form>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Harga">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Jumlah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
