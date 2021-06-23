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
                    <h4 class="text-blue h4">Master Supplier</h4>

                </div>
                <div class="pull-right">
                    <a href="supplier/create" class="btn btn-primary btn-sm scroll-click" type="button">Tambah
                        Supplier</a>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor Hp</th>
                        <th scope="col">Lead Time (Hari)</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($supplier as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama_pemasok }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                        <td>{{ $item->lead_time }}</td>
                        <td><a href="supplier/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
                            {{-- <a rel="{{ $item->id }}" href="javascript:" class="btn btn-danger del">Hapus</a> --}}
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>

        </div>


    </div>

</div>
@endsection
@push('script')
<script>
    $("#table").DataTable();
    $('.del').click(function (e) {
        var id = $(this).attr('rel');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ).then(() => {
                    window.location.href = 'supplier/' + id + '/delete';
                })
            } else {
                Swal.fire('Cancel Deleted!', 'Your imaginary file is safe!');
            }
        })
    });

</script>
@endpush
