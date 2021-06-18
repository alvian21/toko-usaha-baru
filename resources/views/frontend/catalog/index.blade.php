@extends('frontend.main')

@section('landing')
	<div class="landing">
      <div class="home-wrap">
        <div class="home-inner">
        </div>
      </div>
    </div>

    <div class="caption text-center">
      <h1>Katalog Produk</h1>
      <h3>Pusat Busana Termurah dan Terlengkap di Jatirogo</h3>
      <div class="btn_landing">

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
            <div class="row" >
                @forelse ($item as $row)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 filter {{$row->kategori}}">
                    <a href="{{route('catalog.show',[$row->id])}}">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('item_images/'.$row->gambar)}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{$row->nama_barang}}.</p>
                            </div>
                        </div>
                    </a>

                </div>
                @empty

                @endforelse
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
