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
                                <a class="nav-link active text-white" href="{{route('user.index')}}">
                                    Akun Saya
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="https://api.whatsapp.com/send?phone=6282232885121" target="_blank">
                                    <span data-feather="file"></span>
                                    Chat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('order.index')}}">
                                    <span data-feather="shopping-cart"></span>
                                    Pesanan Saya
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('notifikasi.index')}}">
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
            <div class="card" style="height: 32rem">
                <div class="card-body">
                @yield('contentuser')
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
