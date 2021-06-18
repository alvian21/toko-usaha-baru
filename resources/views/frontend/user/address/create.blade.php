@extends('frontend.main')

@section('isi')

<div class="container-fluid" style="margin-top: 10rem">
    <div class="row">

        <div class="col-md-4">
            <div class="card" style="height: 30rem; background-color: #c74a3c;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="https://img1.pngdownload.id/20180529/bxp/kisspng-user-profile-computer-icons-login-user-avatars-5b0d9430b12e35.6568935815276165607257.jpg"
                                alt="..." class="img-thumbnail rounded-circle ml-2" width="100" height="100">
                        </div>
                    </div>
                    <div class="sidebar-sticky ml-4">
                        <ul class="nav flex-column ">
                            <li class="nav-item">
                                <a class="nav-link active text-white" href="#">
                                    Akun Saya
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">
                                    <span data-feather="file"></span>
                                    Chat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    Pesanan Saya
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">
                                    <span data-feather="users"></span>
                                    Notifikasi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('frontend.logout')}}">
                                    <span data-feather="users"></span>
                                    Logout
                                </a>
                            </li>

                        </ul>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="height: 30rem">
                <div class="card-body">
                    @include('dashboard.include.alert')
                    <form method="POST" action="{{route('address.store')}}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">

                                <div>
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" required id="alamat" name="alamat">
                                </div>
                                <div>
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" id="provinsi" name="provinsi">
                                        <option value="0">Pilih Provinsi</option>
                                        {{-- @forelse ($provinsi as $row)
                                        <option value="{{$row['province_id']}}">{{$row['province']}}</option>
                                        @empty

                                        @endforelse --}}
                                    </select>
                                </div>
                                <div>
                                    <label for="kota">Kota</label>
                                    <select class="form-control" id="kota" name="kota">
                                        <option value="0">Pilih kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" class="form-control" required id="kode_pos" name="kode_pos">
                                </div>
                                <div>
                                    <label for="nomor_hp">Nomor Telepon</label>
                                    <input type="text" class="form-control" required id="nomor_hp" name="nomor_hp">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
@push('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#provinsi').select2()
        $('#kota').select2()

        // $('#provinsi').on('change', function () {
        //     var province_id = $(this).val()
        //     $('#kota').empty()
        //     $.ajax({
        //         url:"{{route('address.city')}}",
        //         method:"GET",
        //         data:{
        //             'province_id':province_id
        //         },success:function(data){
        //            for (let index = 0; index < data.length; index++) {
        //                const element = data[index];
        //             $('#kota').append(' <option value="'+element['city_id']+'">'+element['city_name']+'</option>');

        //            }
        //         }
        //     })
        //  })
     })
</script>

@endpush
