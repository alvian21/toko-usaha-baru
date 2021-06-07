@extends('dashboard.main')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <!-- basic table  Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Master Supplier</h4>

                    </div>
                    <div class="pull-right">
                        <a href="#basic-table" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                            data-toggle="collapse" role="button">Tambah Supplier</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Supplier</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor Hp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Supplier 1</td>
                            <td>supplier1@contoh.com</td>
                            <td>08123456789</td>
                            <td><button type="button" class="btn btn-info">Edit</button>
                                <button type="button"
                                    class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Supplier 2</td>
                            <td>supplier2@contoh.com</td>
                            <td>08123456789</td>
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
