@extends('dashboard.main')
@section('content')
<!-- basic table  Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Transaksi Penjualan</h4>
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
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Tanggal Penjualan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>B01</td>
                <td>Hem Kotak-Kotak</td>
                <td>1</td>
                <td>Rp50.000</td>
                <td>20/04/2021</td>
                <td><a href="#edit" class="btn btn-info" role="button">Edit</a> | <a href="#hapus"
                        class="btn btn-danger" role="button">Hapus</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>B02</td>
                <td>Hem Bunder-Bunder</td>
                <td>1</td>
                <td>Rp50.000</td>
                <td>20/04/2021</td>
                <td><a href="#edit" class="btn btn-info" role="button">Edit</a> | <a href="#hapus"
                        class="btn btn-danger" role="button">Hapus</a></td>
            </tr>
        </tbody>
    </table>
    <div class="collapse collapse-box" id="basic-table">
        <div class="code-box">
            <div class="clearfix">
                <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"
                    data-clipboard-target="#basic-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
                <a href="#basic-table" class="btn btn-primary btn-sm pull-right" rel="content-y" data-toggle="collapse"
                    role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
            </div>
            <pre><code class="xml copy-pre" id="basic-table-code">
            </code></pre>
        </div>
    </div>
</div>
<!-- basic table  End -->
@endsection
