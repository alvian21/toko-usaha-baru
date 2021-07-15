@extends('dashboard.main')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Master Keuangan</h4>
                </div>
            </div>
            <form action="{{ 'update' }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Keuangan</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('nama_keuangan') is-invalid @enderror" type="text"
                            value="{{ $finance->nama_keuangan }}" name="nama_keuangan" placeholder="Nama Keuangan">
                        @error('nama_keuangan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jenis Keuangan</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control  @error('jenis_keuangan') is-invalid @enderror" type="text"
                            value="{{ old('jenis_keuangan') }}" name="jenis_keuangan" placeholder="Jenis Keuangan">
                            <option value="pengeluaran" @if($finance->jenis_keuangan == "pengeluaran") selected
                                @endif>Pengeluaran</option>
                            <option value="pendapatan" @if($finance->jenis_keuangan == "pendapatan") selected @endif
                                >Pendapatan</option>
                        </select>

                        @error('jenis_keuangan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-3 row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nominal</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('nominal') is-invalid @enderror" type="number"
                            value="{{ $finance->nominal }}" name="nominal" placeholder="nominal">
                        @error('nominal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('tgl_keuangan') is-invalid @enderror" name="tgl_keuangan"
                            type="date" value="{{ $finance->tgl_keuangan }}" placeholder="Date">
                        @error('tgl_keuangan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Bukti Dokumen</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control  @error('bukti_dokumen') is-invalid @enderror" name="bukti_dokumen"
                            type="file" placeholder="Bukti Dokumen">
                        @error('bukti_dokumen')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Dokumen saat ini</label>
                    <div class="col-sm-12 col-md-10">
                        {{ $finance->bukti_dokumen }}
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
