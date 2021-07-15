@extends('frontend.user.main')

@section('contentuser')
<h3 class="text-center">Notifikasi</h3>
<div class="row">
    <div class="col-md-12">
        @if (session()->has('notifikasi'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('notifikasi')}}.
          </div>
        @else
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Notifikasi masih kosong.
          </div>
        @endif

    </div>
</div>
@endsection

