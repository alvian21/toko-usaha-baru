<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Usaha Baru</title>

    <!-- link -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style-home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style-about.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style-catalog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style-login.css')}}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        #ex4 .p1[data-count]:after {
            position: absolute;
            right: 10%;
            top: 8%;
            content: attr(data-count);
            font-size: 40%;
            padding: .2em;
            border-radius: 50%;
            line-height: 1em;
            color: white;
            background: rgba(255, 0, 0, .85);
            text-align: center;
            min-width: 1em;
            //font-weight:bold;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

    <!-- Start Home Section -->
    <div id="home">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand flex-grow-1" href="#">TokoUsahaBaru.me</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-grow-1 d-flex ml-6">
                        <form class="form-inline flex-nowrap  mx-0 mx-lg-auto rounded p-1">
                            <input class="form-control rounded-pill" style="width:20rem" type="search"
                                placeholder="Search" aria-label="Search">

                        </form>
                    </div>

                    <ul class="navbar-nav  ml-6">
                        <li class="nav-item">
                            <a class="nav-link" onclick="window.location='/'">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('catalog.index')}}">Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="window.location='catalog'">About Us</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" onclick="window.location='/'"><i class="fas fa-bell"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p1 iconcart" href="{{route('cart.index')}}"><i class="fas fa-shopping-cart"
                                data-count="1"></i>@if(session()->has('cart')) {{count(session('cart'))}} @endif</a>
                    </li>
                    {{-- <li class="nav-item">
            <a class="nav-link" onclick="window.location='about'">About Us</a>
          </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/login')}}"><i class="far fa-user-circle"></i>
                            @if(auth()->guard('frontend')->check()) User @else Login @endif</a>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- End Navigation -->

        <!-- Start Landing Page Section -->
        @yield('landing')
        <!-- End Landing Page Section -->

    </div>
    <!-- End Home Section -->

    <!-- Isi Content -->
    @yield('isi')
    <!-- End Isi Content -->

    <!-- Start Footer Section -->
    <div id="footer" class="offset">
        <footer>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <h1>Toko <br> USAHA BARU</h1>
                </div>
                <div class="col-md-4 text-center">
                    <p class="text-center">
                        <strong>CONTACT INFO</strong>
                    </p>
                    <hr class="light">
                    <p>
                        <i class="fas fa-phone"></i>
                        (0356) 551804
                        <br>
                        <i class="fas fa-mobile-alt"></i>
                        +62 822 3288 5121
                        <br>
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Raya Barat No.4
                        <br>
                        Jatirogo - Tuban
                    </p>
                </div>

                <div class="col-md-4 text-center">
                    <p class="text-center">
                        <strong>SITE MAP</strong>
                    </p>
                    <hr class="light">
                    <a class="nav-link" onclick="window.location='home'">Home</a>
                    <a class="nav-link" onclick="window.location='catalog'">Catalog</a>
                    <a class="nav-link" onclick="window.location='about'">About Us</a>
                    <a class="nav-link" onclick="window.location='login'">Login</a>
                </div>

                <hr class="socket">
                &copy; Copyright (2021) - Toko usaha baru
            </div>
        </footer>
    </div>
    <!-- End Footer Section -->

    <!-- Script -->
    <script type="text/javascript" src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/fontawesome-free-5.15.2-web/css/all.css')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/fontawesome-free-5.15.2-web/js/all.js')}}"></script>
    <script src="{{asset('assets/src/scripts/sweetalert2.all.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    @stack('script')
</body>

</html>
