@extends('dashboard.main')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <!-- basic table  Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Master Pegawai</h4>

                    </div>
                    <div class="pull-right">
                        <a href="{{route('employee.create')}}" class="btn btn-primary btn-sm scroll-click"  role="button">Tambah Pegawai</a>
                    </div>
                </div>
                @include('dashboard.include.alert')
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employee as $row)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->username}}</td>
                            <td>
                                <a href="{{route('employee.edit',[$row->id])}}" class="btn btn-info">Edit</a>
                                <button type="button"
                                    class="btn btn-danger">Hapus</button></td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>

            </div>


        </div>

    </div>
@endsection
