@extends('frontend.user.main')

@section('contentuser')
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
            role="tab" aria-controls="nav-home" aria-selected="true">Profile Saya</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
            role="tab" aria-controls="nav-profile" aria-selected="false">Daftar Alamat</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
        aria-labelledby="nav-home-tab">

        <p style="text-align: left" class="mt-4">Kelola informasi profil Anda untuk mengontrol,
            melindungi dan mengamankan akun</p>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{route('address.create')}}" class="btn btn-danger">Tambah Alamat Baru</a>

            </div>
        </div>
        @include('dashboard.include.alert')
        <table class="table table-striped" id="tabelalamat">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Kode Pos</th>
                    <th scope="col">Utama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($address as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->kota}}</td>
                   <td>{{$item->kode_pos}}</td>
                   <td>@if($item->utama ==1) Ya @else Tidak @endif</td>
                   <td>
                       <a href="{{route('address.edit',[$item->id])}}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger">Hapus</button>
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
