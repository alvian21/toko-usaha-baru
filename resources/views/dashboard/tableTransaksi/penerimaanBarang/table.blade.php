@extends('dashboard.main')
@section('content')
<!-- basic table  Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Table Penerimaan Barang</h4>
            <p></p>
        </div>
        <div class="pull-right">
            <a href="#basic-table" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                role="button"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Tambah Data</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Barang ID</th>
                <th scope="col">Pegawai ID</th>
                <th scope="col">Safety Stock ID</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Tanggal Pembelian</th>
                <th scope="col">Bukti Nota</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>B01</td>
                <td>P01</td>
                <td>SS01</td>
                <td>20</td>
                <td>Rp200.000</td>
                <td>20/04/2021</td>
                <td>Nota 1</td>
                <td><a href="#edit" class="btn btn-info" role="button">Edit</a> | <a href="#hapus"
                        class="btn btn-danger" role="button">Hapus</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>B02</td>
                <td>P02</td>
                <td>SS02</td>
                <td>20</td>
                <td>Rp200.000</td>
                <td>20/04/2021</td>
                <td>Nota 2</td>
                <td><a href="#edit" class="btn btn-info" role="button">Edit</a> | <a href="#hapus"
                        class="btn btn-danger" role="button">Hapus</a></td>
            </tr>

        </tbody>
    </table>
</div>
<!-- basic table  End -->
@endsection
