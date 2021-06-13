@extends('frontend.main')

@section('landing')
<div class="landing">
    <div class="home-wrap">
        <div class="home-inner">
        </div>
    </div>
</div>

<div class="caption text-center">
    <h3>Selamat Datang di</h3>
    <h1>Toko Usaha Baru</h1>
    <h3>Pusat Busana Termurah dan Terlengkap di Jatirogo</h3>
    <div class="btn_landing">
        <a class="btn btn-outline-light btn-lg button_landing" onclick="window.location='catalog'">
            <span>Lihat Produk</span>
        </a>
    </div>
</div>
@endsection

@section('isi')
<!-- Start Information Section -->
<div id="information" class="offset">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Gambar</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Subtotal Produk</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">

                <div class="card-body">
                    This is some text within a card body.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Information Section -->





@endsection
