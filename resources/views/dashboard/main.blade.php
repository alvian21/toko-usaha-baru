<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	@include('dashboard.include.header')

    @include('dashboard.include.sidebar')
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
        @yield('content')
	</div>
	<!-- js -->
	<script src="{{asset('assets/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/layout-settings.js')}}"></script>
	{{-- <script src="{{asset('assets/src/plugins/apexcharts/apexcharts.min.js')}}"></script> --}}
	<script src="{{asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	{{-- <script src="{{asset('assets/vendors/scripts/dashboard.js')}}"></script> --}}
    @stack('script')
</body>
</html>
