@extends('dashboard.main')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Tambah Master Customer</h4>
                    </div>
                </div>
                <form>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Nama Supplier">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="password" placeholder="Konfirmasi Password">
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
