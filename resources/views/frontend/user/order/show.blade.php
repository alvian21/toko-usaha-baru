@extends('frontend.user.main')

@section('contentuser')
<h3 class="text-center">Detail Pesanan</h3>
<div class="row">
    <div class="col-md-12">
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
                @forelse ($order as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_barang}}</td>
                    <td>{{$data->jumlah_barang}}</td>
                    <td>{{$data->harga}}</td>
                    <td>{{$data->harga * $data->jumlah_barang }}</td>

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
