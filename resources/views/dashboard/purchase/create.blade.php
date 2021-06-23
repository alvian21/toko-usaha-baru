@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Pembelian</h4>
                </div>
            </div>
            <form action="/admin/purchase/store" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <select multiple class="form-control @error('item_id') is-invalid @enderror" id="item" name="item_id[]">
                            @foreach($item as $row)
                            <option value="{{$row->id}}">{{$row->nama_barang}}</option>
                            @endforeach
                        </select>
                        @error('item_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('jumlah') is-invalid @enderror" type="text" value="{{ old('jumlah') }}" name="jumlah" placeholder="Jumlah">
                        @error('jumlah')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Pegawai</label>
                    <div class="col-sm-12 col-md-10">
                        <select id="exampleFormControlSelect1" name="employee_id" class="form-control  @error('employee_id') is-invalid @enderror">
                            @foreach($employee as $row)
                            <option value="{{$row->id}}">{{$row->nama}}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Supplier</label>
                    <div class="col-sm-12 col-md-10">
                        <select id="exampleFormControlSelect1" name="supplier_id" class="form-control  @error('supplier_id') is-invalid @enderror">
                            @foreach($supplier as $row)
                            <option value="{{$row->id}}">{{$row->nama_pemasok}}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
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
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#item').select2();
    });
</script>

@endpush
