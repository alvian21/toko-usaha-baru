@extends('dashboard.main')
@section('content')
@push('link')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

</style>
@endpush
<div class="row">
    <div class="col-5">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
                @endif
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Tambah Transaksi Penjualan</h4>
                        </div>
                    </div>
                    <form action="{{ 'create/add' }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3 row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="form-control js-example-basic-single" name="id" id="id">
                                    <option value="-" selected disabled>Pilih Barang</option>
                                    @foreach ($items as $i)

                                    <option value="{{ $i->id }}">{{ $i->nama_barang }}</option>
                                    @endforeach

                                </select>
                                @error('id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control  @error('jumlah') is-invalid @enderror" type="number"
                                    value="{{ old('jumlah') }}" id="jumlah" name="jumlah" placeholder="Jumlah">
                                @error('jumlah')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control rupiah @error('harga') is-invalid @enderror" name="harga"
                                    type="number" id="harga" readonly>
                                @error('harga')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="number" name="total" id="total" hidden>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <div class="col-7">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Daftar Barang</h4>
                        </div>
                    </div>
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col" class="text-center">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBarang as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td class="text-dark">{{ $item['nama_barang'] }}</td>
                                <td class="text-dark ">
                                    <div class="input-group pl-5 pr-5">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn btn-secondary btn-number btn-sm minus"
                                                data-id="{{ $item['id'] }}" data-type="minus" data-field="quant[1]">
                                                <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[1]" class="form-control input-number jml"
                                            value="{{ $item['jumlah'] }}" min="1" max="100">

                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary btn-number btn-sm plus"
                                                data-id="{{ $item['id'] }}" data-type="plus" data-field="quant[1]">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-dark">{{  'Rp'.number_format($item['harga'],0,',','.')  }}</td>
                                <td class="p-3"><a href="{{ 'create/delete/'.$item['id'] }}" type="button"
                                        class="btn btn-danger p-1">
                                        X
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <hr>
                    <table class="mt-3">
                        <tbody>

                            <tr>
                                <td class="pr-3"><b>Total</b></td>
                                <td class="pr-3"><b>:</b></td>
                                {{-- <td><b> Rp{{ number_format($total,2,',','.') }}</b></td> --}}
                                <td><b class="total-harga rupiah"></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table class="mt-3">
                        <tbody>
                            <tr>
                                <td class="pr-3"><b>Jumlah Bayar</b></td>
                                <td><input class="form-control rupiah" type="text" name="bayar" id="bayar"></td>
                            </tr>
                            <tr>
                                <td class="pr-3"><b>Kembalian</b></td>
                                <td><b>: <span> <b class="kembalian rupiah"></b></span></b></td>

                            </tr>

                        </tbody>

                    </table>
                    <hr>
                    <div class="justify-content-between">
                        <form action="{{ 'store' }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="submit" name="btn" class="btn btn-primary" value="Simpan">
                            <input type="submit" name="btn" class="btn btn-secondary" value="Cetak Struk">
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
    $(document).ready(function () {

        $('#jumlah').on('change', function () {

            let jml = $(this).val();
            let hrg = $('#harga').val();

            let total = jml * hrg;

            $('#total').val(total);
        });

        $('#harga').on('change', function () {

            let jml = $(this).val();
            let hrg = $('#jumlah').val();

            let total = jml * hrg;

            $('#total').val(total);
        });

        $('#bayar').keyup(function () {

            let bayar = $(this).val();
            let total = $(".total-harga").text();

            bayar = bayar.replace(".", "");
            bayar = bayar.replace(".", "");
            total = total.replace("Rp", "");
            total = total.replace(".", "");
            console.log(bayar);

            let kembalian = bayar - total;

            if (kembalian > 0) {
                $(".kembalian").text("Rp" + formatRupiah(kembalian));
            } else {
                $(".kembalian").text("-");

            }

        });

        $(".minus").on('click', function () {

            let id = $(this).data('id');

            $.ajax({

                url: '/admin/sales/uptMin/' + id,
                method: 'GET',
                success: function (data) {
                    $(".total-harga").text("Rp" + formatRupiah(data));
                    window.location.href = "/admin/sales/create";
                }

            });

        });

        $(".plus").on('click', function () {

            let id = $(this).data('id');

            $.ajax({

                url: '/admin/sales/uptPlus/' + id,
                method: 'GET',
                success: function (data) {
                    $(".total-harga").text("Rp" + formatRupiah(data));
                    window.location.href = "/admin/sales/create";
                }
            });

        });



        $('#id').on('change', function () {

            let id = $(this).find(":selected").val();

            $.ajax({

                url: '/admin/sales/getHarga/' + id,
                method: 'GET',
                success: function (data) {
                    $("#harga").val(data);
                }
            });
        });

        $('.js-example-basic-single').select2();

        $('.btn-number').click(function (e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function () {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
        });

        $(".input-number").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1(e.keyCode == 65 && e.ctrlKey ===
                    true)
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                return;
            }
            // if ((e.shiftKey(e.keyCode < 48 e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            //     e.preventDefault();
            // }
        });

        $.ajax({

            url: '/admin/sales/getTotal',
            method: 'GET',
            success: function (data) {
                console.log(data);
                $(".total-harga").text("Rp" + formatRupiah(data));

            }
        });

        function formatRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++) {
                if (i % 3 == 0) {
                    rupiah += angkarev.substr(i, 3) + '.';
                }
            }
            return rupiah.split('', rupiah.length - 1).reverse().join('');
        }

        $('.rupiah').mask('000.000.000.000', {
            reverse: true
        });


    });

</script>

@endpush
