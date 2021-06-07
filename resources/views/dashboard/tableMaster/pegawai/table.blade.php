@extends('dashboard.main')
@section('content')
<!-- basic table  Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Master Pegawai</h4>
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
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Umur</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Gudang</td>
                <td>Tejo</td>
                <td>Mulyosari</td>
                <td>20</td>
                <td>L</td>
                <td>08326197460</td>
                <td><a href="#edit" class="btn btn-info" role="button">Edit</a> | <a href="#hapus"
                        class="btn btn-danger" role="button">Hapus</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Gudang</td>
                <td>Tejo</td>
                <td>Mulyosari</td>
                <td>20</td>
                <td>L</td>
                <td>08326197460</td>
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
