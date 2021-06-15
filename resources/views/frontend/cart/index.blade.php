@extends('frontend.main')

@section('isi')

<div class="container-fluid" style="margin-top: 10rem">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="height: 30rem">
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
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        @for ($i = 1; $i < $item->stok; $i++)
                                            <option value="{{$i}}" @if($row['qty']==$i) selected @endif>{{$i}}</option>
                                            @endfor


                                    </select>
                                </td>
                                <td>{{ "Rp " . number_format($row['total']*$row['qty'],2,',','.')}}</td>
                                <td>Hapus</td>
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
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="height: 20rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Jumlah Produk:</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 class="pl-1">{{count(session('cart'))}}</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Harga Total:</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 class="pl-1">{{"Rp " . number_format($subtotal,2,',','.')}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="{{route('checkout.index')}}" class="btn btn-danger btn-lg">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
