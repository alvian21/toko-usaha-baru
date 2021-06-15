@extends('frontend.main')

@section('landing')
	<div class="landing landing-login">
		<div class="home-wrap home-wrap-login">
			<div class="home-inner home-inner-login">
			</div>
		</div>
	</div>

	<div class="caption text-center">
		<div class="modal-dialog text-center">
		<div class="col-m-6 main-section">

			<!-- Start Modal -->
			<div class="modal-content modal_form">

				<div class="col-12 user-img">
					<img src="{{asset('frontend/images/foto-toko.jpg')}}">
				</div>

				<form class="col-12" method="POST" action="{{route('customer.register')}}">
                    @include('dashboard.include.alert')
                    @csrf
                    <div class="form-group">
						<input type="text" class="form-control" name="nama_lengkap" required placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" required placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password">
					</div>
					<button type="submit" class="btn button_submit">
						<i class="fas fa-sign-in-alt"></i>
						Register
					</button>
				</form>


			</div>
			<!-- End Modal -->

		</div>
	</div>
	<!-- End Isi -->
	</div>
@endsection
