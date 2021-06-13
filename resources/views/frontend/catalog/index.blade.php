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
        <div class="col-12">
          <h3 class="heading">Jenis Produk</h3>
          <div class="heading-underline"></div>
        </div>
        <div class="row text-center">

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='catalog'">
                <i class="fas fa-female fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Pakaian <br> Wanita</h3>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='pria'">
                <i class="fas fa-male fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Pakaian <br> Pria</h3>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='anak'">
                <i class="fas fa-child fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Pakaian <br> Anak-anak</h3>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='bayi'">
                <i class="fas fa-baby fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Kebutuhan <br> Ibu dan Bayi</h3>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='kasur'">
                <i class="fas fa-bed fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Kasur</h3>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='kain'">
                <i class="fas fa-tape fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Kain</h3>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='alat'">
                <i class="fas fa-mosque fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Alat Sholat</h3>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-4 col-6">
            <div class="catalog">
              <a type="button" class="button_produk" onclick="window.location='lain'">
                <i class="fas fa-ellipsis-h fa-4x" data-fa-transform="shrink-3 up-5"></i>
                <h3>Lain-lain</h3>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Jumbotron -->

  </div>
  <!-- End Catalog Section -->

  <!-- Start Gallery Section -->
  <div id="gallery" class="offset">
    <div class="fixed-background">

      <!-- start row dark -->
      <div class="row dark text-center">
        <div class="col-12">
          <h3 class="heading">Gallery</h3>
          <div class="heading-underline"></div>
        </div>

        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-1.jpeg" class="img-thumbnail" alt="Tampak Depan Toko Usaha Baru" id="gmodal1">
        </div>
        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-2.jpeg" class="img-thumbnail" alt="Berbagai Macam Sprei dengan Motif Menarik" id="gmodal2">
        </div>
        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-3.jpeg" class="img-thumbnail" alt="Berbagai Macam dan Jenis Kain" id="gmodal3">
        </div>
        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-4.jpg" class="img-thumbnail" alt="Pakaian dan perlengkapan bayi" id="gmodal4">
        </div>
        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-5.jpg" class="img-thumbnail" alt="Terdapat Berbagai Jenis Celana untuk Pria dan Wanita" id="gmodal5">
        </div>
        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-6.jpg" class="img-thumbnail" alt="Hem dan Kemeja untuk Pria" id="gmodal6">
        </div>
        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-7.jpg" class="img-thumbnail" alt="Berbagai bentuk Blouse untuk Wanita" id="gmodal7">
        </div>
        <div class="col-lg-3 col-sm-6">
          <img src="images/gmodal-8.jpg" class="img-thumbnail" alt="Jacket untuk Pria dan Wanita" id="gmodal8">
        </div>
      </div>
      <!-- End row dark -->

      <div class="fixed-wrap">
        <div class="fixed">
        </div>
      </div>
    </div>
  </div>
  <!-- End Gallery Section -->

  <!-- Start The Modal -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption_modal"></div>
  </div>

  <script>
  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  //gambar modal 1
  var img = document.getElementById('gmodal1');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  //gambar modal 2
  var img = document.getElementById('gmodal2');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  //gambar modal 3
  var img = document.getElementById('gmodal3');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  //gambar modal 4
  var img = document.getElementById('gmodal4');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  //gambar modal 5
  var img = document.getElementById('gmodal5');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  //gambar modal 6
  var img = document.getElementById('gmodal6');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  //gambar modal 7
  var img = document.getElementById('gmodal7');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  //gambar modal 8
  var img = document.getElementById('gmodal8');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption_modal");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }


    document.getElementById('change').onclick = changeColor;
    function changeColor() {
        document.body.style.color = "purple";
        return false;
    }

  </script>
  <!-- End The Modal -->
@endsection
