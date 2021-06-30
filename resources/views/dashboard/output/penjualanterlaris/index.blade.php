@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <!-- basic table  Start -->
        <div class="row">
            <div class="col-md-6">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Laporan Penjualan | Terlaris</h4>

                        </div>

                    </div>
                    <form action="{{ route('laporan.cetak.penjualanterlaris') }}" method="POST" target="_blank">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Transaksi</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="form-control" id="exampleFormControlSelect1" name="transaksi">
                                    <option value="semua">Semua</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-12 col-md-2 col-form-label">Periode</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control @error('periode1') is-invalid @enderror" name="periode1" required type="date">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control @error('periode2') is-invalid @enderror" name="periode2" required type="date">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>


    </div>

</div>
@endsection
