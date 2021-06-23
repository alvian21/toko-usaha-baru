@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Safety Stok</h4>
                </div>
            </div>
            <form method="POST" action="{{route('safetystok.update',[$safety->id])}}">
                @include('dashboard.include.alert')
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control js-example-basic-single" id="barang" name="barang">
                            <option value="-" selected disabled>Pilih Barang</option>
                            @forelse ($item as $row)

                            <option value="{{$row->id}}">{{$row->nama_barang}}</option>

                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Supplier</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control js-example-basic-single" id="supplier" name="supplier">
                            <option value="-" selected disabled>Pilih Supplier</option>
                            @forelse ($supplier as $row)

                            <option value="{{$row->id}}">{{$row->nama_pemasok}}</option>

                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="number" name="jumlah" value="{{$safety->jumlah}}"
                            placeholder="Jumlah">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea class="form-control" id="keterangan" name="keterangan"
                            rows="3">{{$safety->keterangan}}</textarea>
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
