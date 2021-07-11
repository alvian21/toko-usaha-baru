@extends('dashboard.main')
@section('content')
@include('dashboard.include.alert')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Master Barang</h4>
                </div>
            </div>
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-12 col-md-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('kode_barang') is-invalid @enderror"
                            value="{{ old('kode_barang') }}" name="kode_barang" type="text" placeholder="Kode Barang">
                        @error('kode_barang')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
                    <label class="col-sm-12 col-md-2 col-form-label">Harga Beli</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('harga_beli') is-invalid @enderror"
                            value="{{ old('harga_beli') }}" name="harga_beli" type="number" placeholder="harga beli">
                        @error('nama_barang')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Harga Jual</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('harga_jual') is-invalid @enderror"
                            value="{{ old('harga_jual') }}" name="harga_jual" type="number" placeholder="harga jual">
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
                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                            <option value="-" disabled selected>Pilih Kategori</option>
                            @foreach ( $kategori as $i)
                            <option value="{{ $i->id }}">{{ $i->nama_kategori }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
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
