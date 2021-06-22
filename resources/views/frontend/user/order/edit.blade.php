@extends('frontend.user.main')

@section('contentuser')
@include('dashboard.include.alert')
<h3 class="text-center">Upload Pembayaran</h3>
<form method="POST" action="{{route('order.update',[$sales->id])}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-12">
            <div>
                <label for="upload_pembayaran">Upload Pembayaran</label>
                <input type="file" class="form-control" required id="upload_pembayaran" name="upload_pembayaran">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </div>
</form>
@endsection
@push('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endpush
