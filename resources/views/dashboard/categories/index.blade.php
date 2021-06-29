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
                    <h4 class="text-blue h4">Master Kategori</h4>

                </div>
                <div class="pull-right">
                    <a href="categories/create" class="btn btn-primary btn-sm scroll-click" type="button">Tambah
                        Kategori</a>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Id Kategori</th>
                        <th scope="col">Nama Kategori</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($kategori as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td><a href="categories/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
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
