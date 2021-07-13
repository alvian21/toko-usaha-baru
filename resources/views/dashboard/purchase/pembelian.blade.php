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
                    <h4 class="text-blue h4">Pembelian Barang</h4>
                </div>
                <div class="pull-right">
                    <a href="purchase/create" class="btn btn-primary btn-sm scroll-click" type="button">Tambahkan</a>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Total Beli</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase as $item)
                    <tr>
                        <td>{{ $item->item->nama_barang}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->employee->nama}}</td>
                        <td>{{ $item->supplier->nama_pemasok}}</td>
                        <td>{{ $item->jumlah * $item->item->harga_beli }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-info">Lihat</a> --}}
                            @if( $item->status == "belum dikirim")
                            <button class="btn btn-success kirim" data-id="{{$item->id}}" type="button">Kirim</button>
                            @elseif ($item->status == "sudah dikirim")
                            <button class="btn btn-info diterima" data-id="{{$item->id}}"
                                type="button">Diterima</button>
                            @else
                            <button class="btn btn-secondary" disabled data-id="{{$item->id}}" type="button">Sudah
                                Diterima</button>
                            @endif
                            {{-- <a href="purchase/{purchase}/edit" class="btn btn-info">Edit</a> --}}
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
    $(document).ready(function () {
        $('.kirim').on('click', function () {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Ketika sudah dikirim pembelian tidak dapat di cancel!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, kirim!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{url('admin/purchase/kirim/')}}/" + id
                }
            })
        })

        $('.diterima').on('click', function () {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Ketika barang sudah diterima, stok bertambah dan tidak bisa dicancel!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Barang diterima!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{url('admin/purchase/diterima/')}}/" + id
                }
            })
        })
    })

</script>
@endpush
