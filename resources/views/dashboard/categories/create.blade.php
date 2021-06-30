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
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori"
                            type="text">
                        @error('nama_kategori')
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
