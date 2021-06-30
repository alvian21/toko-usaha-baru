@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Master Barang</h4>
                </div>
            </div>
            <form action="{{ 'update' }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('nama_barang') is-invalid @enderror" type="text"
                            value="{{ $item->nama_barang }}" name="nama_barang" placeholder="Nama barang">
                        @error('nama_barang')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Harga Beli</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('harga_beli') is-invalid @enderror"
                            value="{{ $item->harga_beli }}" name="harga_beli" type="number" placeholder="Harga">
                        @error('nama_barang')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Harga Jual</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('harga_jual') is-invalid @enderror"
                            value="{{ $item->harga_jual }}" name="harga_jual" type="number" placeholder="Harga">
                        @error('nama_barang')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Stok</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('stok') is-invalid @enderror" value="{{ $item->stok }}"
                            name="stok" type="number" placeholder="Stok">
                        @error('stok')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" id="kategori" name="kategori">

                            @foreach ( $kategori as $i)
                            <option value="{{ $i->id }}" @if ($item->category_id == $i->id)
                                selected
                                @endif>{{ $i->nama_kategori }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi"
                            rows="3">{{ $item->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" type="file">
                        @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Gambar saat ini</label>
                    <div class="col-sm-12 col-md-10">
                        <img width="80px" src="{{ url('/item_images/' . $item->gambar) }}" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
