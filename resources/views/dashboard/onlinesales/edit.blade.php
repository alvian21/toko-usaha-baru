@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Penjualan Online</h4>
                </div>
            </div>
            <form method="POST" action="{{route('onlinesales.update',[$sales->id])}}">
                @include('dashboard.include.alert')
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Customer</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value="{{$sales->customer->nama_lengkap}}" readonly placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nomor Resi</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="no_resi" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" id="status" name="status">
                            <option value="dikonfirmasi">Di Konfirmasi</option>
                            <option value="dibatalkan">Di Batalkan</option>
                            <option value="diproses">Di Proses</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" id="status_pembayaran" name="status_pembayaran">
                            <option value="Belum di bayar">Belum di bayar</option>
                            <option value="Sudah di bayar">Sudah di bayar</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Biaya Kirim</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="number" name="ongkir" placeholder="5000">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jasa Kirim</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="jasa" placeholder="Jne">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Bukti Pembayaran</label>
                    <div class="col-sm-12 col-md-10">
                        <a href="{{asset('bukti_pembayaran/'.$sales->bukti_pembayaran)}}" target="_blank">Bukti Pembayaran</a>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
