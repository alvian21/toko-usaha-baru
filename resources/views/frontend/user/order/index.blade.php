@extends('frontend.user.main')

@section('contentuser')
<h3 class="text-center">Data Pesanan</h3>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" id="tabelalamat">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">No Resi</th>
                    <th scope="col">Total Barang</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($order as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->tgl_transaksi}}</td>
                    <td>{{$item->no_resi}}</td>
                    <td>{{$item->total_barang}}</td>
                    <td>{{$item->status}}</td>

                    <td>
                        <a href="{{route('order.show',[$item->id])}}" class="btn btn-warning">Detail</a>
                        @if($item->status == "dikonfirmasi" && $item->status == "belum dibayar")
                        <a href="{{route('order.edit',[$item->id])}}" class="btn btn-info">Upload Pembayaran</a>
                        @endif
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
            $('#tabelalamat').DataTable()
        })
</script>
@endpush
