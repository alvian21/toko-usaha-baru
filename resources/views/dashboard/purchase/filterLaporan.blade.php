@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Pilih Periode laporan</h4>
                </div>
            </div>
            <form action="{{ '/admin/purchase/getLaporan' }}" method="get">
                @csrf
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal Awal</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="date" name="tgl_awal">
                    </div>
                </div>
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="date" name="tgl_akhir">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
