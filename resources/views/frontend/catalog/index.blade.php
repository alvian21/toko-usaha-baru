@extends('frontend.main')

@section('landing')
<div class="landing">
    <div class="home-wrap">
        <div class="home-inner">
        </div>
    </div>
</div>


@endsection

@section('isi')

<!-- Start Catalog Section -->
<div id="catalog" class="offset">

    <!-- Start Jumbotron -->
    <div class="jumbotron">
        <div class="narrow text-center">

            <div class="row text-center">
                <div class="col-md-12 text-center">

                    <div class="flex-w flex-sb-m p-b-52">
                        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                            <button class="btn btn-lg filter-button" data-filter="all">
                                All Products
                            </button>

                            <button class="btn btn-lg filter-button" data-filter="women">
                                Wanita
                            </button>

                            <button class="btn btn-lg filter-button" data-filter="pria">
                                Pria
                            </button>

                            <button class="btn btn-lg filter-button" data-filter="anak-anak">
                                Anak - anak
                            </button>

                            <button class="btn btn-lg filter-button" data-filter="ibu-dan-bayi">
                                Ibu dan bayi
                            </button>

                            <button class="btn btn-lg filter-button" data-filter="kasur">
                                Kasur
                            </button>

                            <button class="btn btn-lg filter-button" data-filter="alat-sholat">
                                Alat Sholat
                            </button>
                            <button class="btn btn-lg filter-button" data-filter="lain-lain">
                                Lain - Lain
                            </button>


                        </div>

                    </div>

                </div>
            </div>
            <div class="row isotope-grid" style="position: relative; height: 392.75px;">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item filter women"
                    style="position: absolute; left: 0%; top: 0px;">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="images/gmodal-1.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumbotron -->

</div>
<!-- End Catalog Section -->


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
    $(document).ready(function(){

$(document).on("click",".filter-button",function(){
    var value = $(this).attr('data-filter');

    if(value == "all")
    {
        $('.filter').show('1000');
    }
    else
    {
        $(".filter").not('.'+value).hide('2000');
        $('.filter').filter('.'+value).show('2000');

    }
});

if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});

</script>
@endpush
