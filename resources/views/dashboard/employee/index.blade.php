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
                    <a href="{{route('employee.create')}}" class="btn btn-primary btn-sm scroll-click"
                        role="button">Tambah Pegawai</a>
                </div>
            </div>
            @include('dashboard.include.alert')
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employee as $row)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->role}}</td>
                        <td>
                            <a href="{{route('employee.edit',[$row->id])}}" class="btn btn-info">Edit</a>
                            <button type="button" class="btn btn-danger deletedata"
                                data-id="{{$row->id}}">Hapus</button></td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>

        </div>


    </div>

</div>
@endsection
@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {

        function ajax() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        $(document).on('click', '.deletedata', function () {
            var id = $(this).data('id');

            swal({
                    title: "Apa kamu yakin untuk menghapus data karyawan?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        ajax();
                        $.ajax({
                            url: "{{url('admin/employee/')}}/" + id,
                            method: "DELETE",
                            success: function (data) {
                                if (data['message'] == "true") {
                                    swal("Data karyawan berhasil dihapus!", {
                                        icon: "success",
                                    });
                                    setTimeout(function () {
                                        window.location.href =
                                            "{{route('employee.index')}}";
                                    }, 1500)
                                }
                            }
                        })


                    }
                });

        })
    })

</script>
@endpush
