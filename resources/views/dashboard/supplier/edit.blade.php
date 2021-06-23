@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Master Supplier</h4>
                </div>
            </div>
            <form action="{{ 'update' }}" method="POST">
                @method('patch')
                @csrf
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Supplier</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value="{{ $supplier->nama_pemasok }}"
                            name="nama_pemasok" placeholder="Nama Supplier">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value="{{ $supplier->alamat }}" name="alamat"
                            placeholder="Alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="email" type="email" value=" {{ $supplier->email }}"
                            placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nomor Hp</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="nomor_telepon" type="text"
                            value="{{ $supplier->nomor_telepon }}" placeholder="Nomor Hp">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Lead Time</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="lead_time" type="number" value="{{ $supplier->lead_time }}"
                            placeholder="Lead Time">
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
