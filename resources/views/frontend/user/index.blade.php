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
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                               
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
