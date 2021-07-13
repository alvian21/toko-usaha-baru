@extends('frontend.main')

@section('landing')
<div class="landing">
    <div class="home-wrap">
        <div class="home-inner">
        </div>
    </div>
</div>
<div class="caption text-center">
    <h1></h1>
    <h1>Tentang Toko Usaha Baru</h1>
    <h3>Berikut merupakan sekilas informasi mengenai toko kami</h3>
</div>
@endsection

@section('isi')
  <!-- Start Information Section -->
  <div id="information" class="offset">
    <div class="col-12 narrow text-center">
      <h1>
        <strong> Toko Usaha Baru</strong>
      </h1>
      <p class="lead">Toko Usaha Baru merupakan salah satu toko yang ada di Jatirogo yang menjual berbagai macam busana, mulai dari pakaian wanita, pakai pria, anak-anak, hingga menjual berbagai macam kain yang berkualitas.</p>
      <p class="lead">Apabila anda tertarik terhadap produk yang kami tawarkan, Anda dapat langsung mengunjungi toko kami yang berada di Jl. Raya Barat No.4 dan berada di depan kantor kecamatan Jatirogo.</p>
    </div>
  </div>
  <!-- End Information Section -->

<!-- Start About Us Section -->
<div id="aboutus" class="offset">
    <!-- Start Jumbotron -->
    <div class="jumbotron">
        <div class="narrow text-center">

            <div class="row text-center">
                <div class="col-md-12 text-center">

                    <div class="flex-w flex-sb-m p-b-52">
                        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                        </div>
                    </div>
                </div>
                <div class="container-table100">
                    <h3>LOKASI KAMI</h3>
                    <!--Google map-->
                    <div id="map-container-google-1" class="z-depth-1-half map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2599622581964!2d111.65805703220347!3d-6.885830417932955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7712845ffd6a5f%3A0x63a98e36486064f3!2sUsaha%20Baru!5e0!3m2!1sen!2sid!4v1623689888682!5m2!1sen!2sid" width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <!--Google Maps-->
                </div>
            </div>
        </div>
        <!-- End Jumbotron -->

    </div>
    <!-- End About Us Section -->


    <!-- Start The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption_modal"></div>
    </div>

    <!-- End The Modal -->
    @endsection
    @push('script')

    <script>
        $(document).ready(function() {

            $(document).on("click", ".filter-button", function() {
                var value = $(this).attr('data-filter');

                if (value == "all") {
                    $('.filter').show('1000');
                } else {
                    $(".filter").not('.' + value).hide('2000');
                    $('.filter').filter('.' + value).show('2000');

                }
            });

            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
            }
            $(this).addClass("active");

        });
    </script>
    @endpush