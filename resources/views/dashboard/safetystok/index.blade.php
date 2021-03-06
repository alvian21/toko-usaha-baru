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
                    <h4 class="text-blue h4"> Safety Stok</h4>
                </div>
                <div class="pull-right">
                    <a href="{{route('safetystok.create')}}" class="btn btn-primary btn-sm scroll-click"
                        role="button">Tambah Safety Stok</a>
                </div>
            </div>
            @include('dashboard.include.alert')
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Nama Pemasok</th>
                        <th scope="col">Jumlah SS</th>
                        <th scope="col">Reorder Point</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($safety as $row)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$row->item->nama_barang}}</td>
                        <td>{{$row->supplier->nama_pemasok}}</td>
                        <td>{{$row->jumlah}}</td>
                        <td>{{$row->reorder_point}}</td>
                        <td>{{$row->keterangan}}</td>
                        <td>
                            {{-- <a href="{{route('safetystok.edit',[$row->id])}}" class="btn btn-info">Edit</a> --}}
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

        $(".table").DataTable();

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
                    title: "Apa kamu yakin untuk menghapus data Safetystok?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        ajax();
                        $.ajax({
                            url: "{{url('admin/safetystok/')}}/" + id,
                            method: "DELETE",
                            success: function (data) {
                                if (data['message'] == "true") {
                                    swal("Data Safety stok berhasil dihapus!", {
                                        icon: "success",
                                    });
                                    setTimeout(function () {
                                        window.location.href =
                                            "{{route('safetystok.index')}}";
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
