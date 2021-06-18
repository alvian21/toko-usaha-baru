@extends('frontend.main')

@section('isi')

<div class="container-fluid" style="margin-top: 10rem">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card" style="height: 30rem; background-color: #c74a3c;">
                <div class="card-body">
                    <h3 class="text-white text-center">{{"Rp " . number_format(session('total_harga'),2,',','.')}}</h3>

                    <h3  class="text-white text-center mt-5">BCA</h3>
                    <h4  class="text-white text-center">901289931 | a/n Amanda</h4>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-light">Upload Bukti Pembayaran</button>
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
