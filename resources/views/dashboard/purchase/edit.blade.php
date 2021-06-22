@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Pembelian</h4>
                </div>
            </div>
            <form action="purchase/{purchase}/update" method="POST">
                @method('patch')
                @csrf
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Id Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value="{{ $purchases->item_id}}"
                            name="item_id[]" placeholder="Id Barang">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value="{{ $purchases->jumlah}}"
                            name="jumlah[]" placeholder="Jumlah">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Id Pegawai</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value = "{{ $purchases->employee_id}}"
                            name="employee_id" placeholder="Id Pegawai">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Id Supplier</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value="{{ $purchases->supplier_id}}" 
                            name="supplier_id" placeholder="Id Supplier">
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
