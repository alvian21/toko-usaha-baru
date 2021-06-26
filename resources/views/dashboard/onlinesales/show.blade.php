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
                    <h4 class="text-blue h4">Detail Transaksi Penjualan Online</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-dark mb-2">Kode Transaksi : {{$sales->id}}</h6>
                    <h6 class="text-dark mb-2">Tanggal Transaksi : {{$sales->tgl_transaksi}}</h6>
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Harga</th>
                                <th scope="col" class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @forelse ($order as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_barang}}</td>
                                <td>{{$data->jumlah_barang}}</td>
                                <td>@rupiah($data->harga)</td>
                                <td class="text-right">@rupiah($data->harga * $data->jumlah_barang )</td>
                            </tr>
                            @php
                                $total+=$data->harga * $data->jumlah_barang;
                            @endphp
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <h6 class="text-dark mt-2">Total Harga: @rupiah($total)</h6>
                            <h6 class="text-dark mt-2">Ongkir: @rupiah($sales->ongkir)</h6>
                            <h6 class="text-dark mt-2">Grand Total: @rupiah($sales->ongkir + $total)</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>
@endsection
@push('script')
<script>
    $("#table").DataTable({
                searching: false, paging: false, info: false
            });



</script>
@endpush
