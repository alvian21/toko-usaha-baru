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

            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Tanggal Penjualan</th>
                        <th scope="col">Total Barang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($sales as $item)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$item->id}}</td>
                              <td>{{$item->customer->nama_lengkap}}</td>
                              <td>{{$item->tgl_transaksi}}</td>
                              <td>{{$item->total_barang}}</td>
                              <td>{{$item->status}}</td>
                              <td>@if($item->bukti_pembayaran != 'belum di upload') sudah di upload @else belum di upload @endif</td>
                              <td>
                                  <a href="{{route('onlinesales.edit',[$item->id])}}"  class="btn btn-primary">Edit</a>
                                  <a href="{{route('onlinesales.show',[$item->id])}}"  class="btn btn-info">Detail</a>
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



</script>
@endpush
