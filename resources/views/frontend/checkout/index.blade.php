@extends('frontend.main')

@section('isi')

<div class="container-fluid" style="margin-top: 10rem">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>Alamat : {{$address->alamat}}, {{$address->kota}}, {{$address->kode_pos}}, {{$address->provinsi}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="height: 40rem">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Subtotal Produk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            $subtotal = 0;
                            @endphp
                            @if (session()->has('cart'))
                            @forelse ($item as $item)

                            @forelse (session('cart') as $row)
                            @if ($item->id == $row['id_barang'])
                            <tr>
                                <td>{{$no}}</td>
                                <td> <img class="img-tdumbnail " width="100px"
                                        src="{{asset('item_images/'.$item->gambar)}}" alt="Card image cap"></td>
                                <td>
                                    <select class="form-control qty" id="qty">
                                        @for ($i = 1; $i <= $item->stok; $i++)
                                            <option data-id="{{$row['id_barang']}}" value="{{$i}}" @if($row['qty']==$i)
                                                selected @endif>{{$i}}</option>
                                            @endfor


                                    </select>
                                </td>
                                <td>{{ "Rp " . number_format($row['total']*$row['qty'],2,',','.')}}</td>
                                <td style="cursor: pointer" class="hapus" data-id="{{$row['id_barang']}}">Hapus</td>
                            </tr>

                            @php
                            $subtotal += $row['total']*$row['qty'];
                            $no++;
                            @endphp
                            @endif
                            @empty

                            @endforelse

                            @empty

                            @endforelse
                            @endif

                        </tbody>
                        <input type="hidden" name="subtotal" id="subtotal" value="{{$subtotal}}">
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 16rem">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Opsi Pengiriman:</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="code" id="code1"
                                            value="{{$code}}">
                                        <label class="form-check-label" for="code1">
                                            {{$code}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Biaya Pengiriman:</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 id="biaya"></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="cold-md-12">
                                    <h6 id="etd" class="ml-3"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 20rem">
                        <form action="{{route('checkout.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Total:</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="pl-1">{{"Rp " . number_format($subtotal,2,',','.')}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Pengiriman:</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 id="pengiriman">0</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Harga Total:</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="pl-1" id="hargatotal">{{"Rp " . number_format($subtotal,2,',','.')}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">

                                        <button type="submit" class="btn btn-danger">Buat Pesanan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
        var biaya = 0;
        function ajax() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        }

        $('#code1').on('change', function(){
             var code =$(this).val();
             var subtotal = $('#subtotal').val();
             $.ajax({
                 url:"{{route('checkout.getharga')}}",
                 method:"GET",
                 async: false,
                 data:{
                     'code':code
                 }, success:function(data){
                     var total = parseInt(subtotal) + parseInt(data['biaya'])
                     biaya = data['biaya'];
                     $('#hargatotal').text("Rp "+convertToRupiah(total));
                     $('#biaya').text("Rp "+convertToRupiah(data['biaya']))
                     $('#pengiriman').text("Rp "+convertToRupiah(data['biaya']))
                     $('#etd').text('Estimasi pengiriman '+data['etd']+' hari')
                 }
             })
        })

        $('.qty').on('change', function () {
            var qty = $(this).find(':selected').val()
            var id = $(this).find(':selected').data('id');
            ajax()
             $.ajax({
                 url:"{{route('checkout.qty')}}",
                 method:"POST",
                 data:{
                     'id':id,
                     'qty':qty
                     },success:function(data){
                        window.location.href="{{route('checkout.index')}}"
                     }
             })
         })

         $('.hapus').on('click', function(){
             var id = $(this).data('id');

             $.ajax({
                 url:"{{route('checkout.delete')}}",
                 method:"GET",
                 data:{
                     'id':id
                     },success:function(data){
                        window.location.href="{{route('checkout.index')}}"
                     }
             })
         })

        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++) {
                if (i%3 == 0) {
                rupiah += angkarev.substr(i,3)+'.';
                }
            }
            return rupiah.split('',rupiah.length-1).reverse().join('') + ",00";
        }
    })
</script>
@endpush
