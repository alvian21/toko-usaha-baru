@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Master Supplier</h4>
                </div>
            </div>
            <form action="{{ 'store' }}" method="POST">
                @csrf
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Supplier</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('nama_pemasok') is-invalid @enderror" type="text"
                            value="{{ old('nama_pemasok') }}" name="nama_pemasok" placeholder="Nama Supplier">
                        @error('nama_pemasok')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('alamat') is-invalid @enderror" type="text"
                            value="{{ old('alamat') }}" name="alamat" placeholder="Alamat">
                        @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('email') is-invalid @enderror" name="email" type="email"
                            value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nomor Hp</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon"
                            type="text" value="{{ old('nomor_telepon') }}" placeholder="Nomor Hp">
                        @error('nomor_telepon')
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
