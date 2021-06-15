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
            <form action="{{ 'store' }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('nama_barang') is-invalid @enderror"
                            value="{{ old('nama_barang') }}" name="nama_barang" type="text" placeholder="Nama Barang">
                        @error('nama_barang')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('harga') is-invalid @enderror" value="{{ old('harga') }}"
                            name="harga" type="number" placeholder="Harga">
                        @error('nama_barang')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Stok</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}"
                            name="stok" type="number" placeholder="Stok">
                        @error('stok')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}"
                            name="gambar" type="file">
                        @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
