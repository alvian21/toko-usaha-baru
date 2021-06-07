@extends('dashboard.main')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <!-- basic table  Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Master Barang</h4>

                    </div>
                    <div class="pull-right">
                        <a href="#basic-table" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                            data-toggle="collapse" role="button">Tambah Barang</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Barang 1</td>
                            <td>4</td>
                            <td>10000</td>
                            <td><button type="button" class="btn btn-info">Edit</button>
                                <button type="button"
                                    class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Barang 2</td>
                            <td>3</td>
                            <td>8000</td>
                            <td><button type="button" class="btn btn-info">Edit</button>
                                <button type="button"
                                    class="btn btn-danger">Hapus</button></td>
                        </tr>
                    </tbody>
                </table>

            </div>


        </div>

    </div>
@endsection
