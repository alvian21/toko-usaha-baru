@extends('frontend.user.main')

@section('contentuser')
<h3 class="text-center">Detail Pesanan</h3>
<div class="row">
    <div class="col-md-12">
        <h6 class="text-dark">Kode Transaksi : {{$sales->id}}</h6>
        <h6 class="text-dark mb-2">Tanggal Transaksi : {{$sales->tgl_transaksi}}</h6>
        <table class="table table-striped" id="tabelalamat">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Subtotal</th>
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
                    <td>@rupiah($data->harga * $data->jumlah_barang )</td>
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
                <h6 class="text-dark">Ongkir: @rupiah($sales->ongkir)</h6>
                <h6 class="text-dark">Grand Total: @rupiah($sales->ongkir + $total)</h6>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $('#tabelalamat').DataTable({
                searching: false, paging: false, info: false
            })
        })
    </script>
@endpush
