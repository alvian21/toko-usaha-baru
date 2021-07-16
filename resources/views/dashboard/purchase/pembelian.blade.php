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
                    <h4 class="text-blue h4">Pembelian Barang</h4>
                </div>
                <div class="pull-right">
                    <a href="purchase/create" class="btn btn-primary btn-sm scroll-click" type="button">Tambahkan</a>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Id Pembelian</th>
                        <th scope="col">Id Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Id Pegawai</th>
                        <th scope="col">Id Supplier</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->item->nama_barang}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->employee->nama}}</td>
                        <td>{{ $item->supplier->nama_pemasok}}</td>
                        <td>
                            <a href="/purchase/formpembelian" class="btn btn-info">Lihat</a>
                            <a href="purchase/{purchase}/edit" class="btn btn-info">Edit</a>
                            <a href="" class="btn btn-info">Kirim</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
