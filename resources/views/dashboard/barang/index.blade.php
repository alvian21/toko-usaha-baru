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
                    <h4 class="text-blue h4">Master Barang</h4>

                </div>
                <div class="pull-right">
                    <a href="item/create" class="btn btn-primary btn-sm scroll-click" type="button">Tambah
                        Barang</a>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($barang as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->harga_beli }}</td>
                        <td>{{ $item->harga_jual }}</td>
                        <td><img width="80px" src="{{ url('/item_images/' . $item->gambar) }}" alt=""></td>
                        <td><a href="item/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
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
                    window.location.href = 'item/' + id + '/delete';
                })
            } else {
                Swal.fire('Cancel Deleted!', 'Your imaginary file is safe!');
            }
        })
    });

</script>
@endpush
