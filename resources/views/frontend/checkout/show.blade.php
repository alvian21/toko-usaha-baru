@extends('frontend.main')

@section('isi')

<div class="container-fluid" style="margin-top: 10rem">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card" style="height: 20rem; background-color: #c74a3c;">
                <div class="card-body">
                    <h4  class="text-white text-center">Mohon ditunggu, pesanan sedang di konfirmasi</h4>
                    <h4  class="text-white text-center">Untuk pembayaran, silahkan cek di menu pesanan</h4>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-light">Menu Pesanan</button>
                        </div>
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

        function ajax() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        }



    })
</script>
@endpush
