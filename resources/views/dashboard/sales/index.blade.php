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
                    <h4 class="text-blue h4">Transaksi Penjualan</h4>

                </div>
                <div class="pull-right">
                    <a href="sales/create" class="btn btn-primary btn-sm scroll-click" type="button">Tambah
                        Penjualan</a>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Status Penjualan</th>
                        <th scope="col">Tanggal Penjualan</th>
                        <th scope="col">Total Barang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($sls_trans as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->status_penjualan }}</td>
                        <td>{{ $item->tgl_transaksi }}</td>
                        <td>{{ $item->total_barang }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#exampleModallarge"
                                class="btn btn-primary detail-sales" data-id="{{ $item->id }}">Detail</button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>

        </div>


    </div>

</div>
{{-- Modal --}}
<div class="modal fade" id="exampleModallarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLarge">Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-data-table">
                    <table class="table nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Barang</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>

                        <tbody class="data-detail">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $("#table").DataTable();

    $(".detail-sales").on('click', function () {

        let id = $(this).data('id');


        $.ajax({

            url: '/admin/sales/detail/' + id,
            method: 'GET',
            success: function (data) {

                data.forEach(e => {

                    $(".data-detail").append(
                        '<tr>' +
                        '<td class="' + 'text-dark' + '"><b>' + e
                        .nama_barang + '</b></td>' +
                        '<td class="' + 'text-dark' + '"><b>' + e
                        .jumlah_barang + '</b></td>' +
                        '<td class="' + 'text-dark' + '"><b>' + e.harga +
                        '</b></td>' +
                        '<td class="' + 'text-dark' + '"><b>' + e.total +
                        '</b></td>' +
                        '</tr>'
                    );
                });
            }
        });
    });

</script>
@endpush
