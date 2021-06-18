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

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" style="width: 28rem;">
                                <img class="card-img-top" src="{{asset('item_images/'.$item->gambar)}}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{$item->nama_barang}}.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p style="text-align: justify">
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                here', making it look like readable English. Many desktop publishing packages and web
                                page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                                over the years, sometimes by accident, sometimes on purpose (injected humour and the
                                like).
                            </p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn btn-outline-secondary btn-number"
                                                disabled="disabled" data-type="minus" data-field="quant[1]">
                                                <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[1]" class="form-control input-number" value="1"
                                            min="1" max="{{$item->stok}}">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary btn-number"
                                                data-type="plus" data-field="quant[1]">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btncart" data-id="{{$item->id}}">Add to
                                        cart</button>
                                </div>
                            </div>
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

        function ajax() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        }

        $('.btn-number').click(function(e){
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {

            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            }
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {

    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});

$(".input-number").keydown(function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        (e.keyCode == 65 && e.ctrlKey === true) ||
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});


$('.btncart').on('click', function () {
    //   $('.iconcart')
    var id = $(this).data('id');
     var qty =$('.input-number').val();
     ajax()
    $.ajax({
        url:"{{route('cart.store')}}",
        method:"POST",
        data:{
            'id':id,
            'qty':qty
        },success:function(data){

            if(data == 'false'){
                Swal.fire('Login terlebih dahulu')
            }else{
            $('.iconcart').html(data)
            }

        },error:function(data){
            Swal.fire('Login terlebih dahulu')
        }
    })

 })


});

</script>
@endpush
