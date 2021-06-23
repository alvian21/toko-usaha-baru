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
                    <h4 class="text-blue h4">Data Penerimaan Barang</h4>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Id Penerimaan</th>
                        <th scope="col">Id Pembelian</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Tanggal Penerimaan</th>
                        <th scope="col">Bukti Nota</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reception as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $item->id_pembelian}}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah}}</td>
                        <td>{{ $item->harga}}</td>
                        <td>{{ $item->total_harga}}</td>
                        <td class="date">{{ $item->tgl_penerimaan}}</td>
                        <td>{{ $item->bukti_nota}}</td>
                        <td>{{ $item->nama_pegawai}}</td>
                        <td>
                            <a href="" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection