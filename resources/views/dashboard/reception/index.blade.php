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
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">Penerimaan Barang</h4>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>

                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Tanggal Diterima</th>
                        <th scope="col">Total Beli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reception as $item)
                    <tr>
                        <td>{{ $item->item->nama_barang}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->nama_pegawai}}</td>
                        <td>{{ $item->purchase->supplier->nama_pemasok}}</td>
                        <td>{{ $item->tgl_penerimaan }}</td>
                        <td>{{ $item->total_harga }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
