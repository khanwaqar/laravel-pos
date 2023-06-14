<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{__('FLEXIBLEPOS v2.0')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
	{{-- <link href="{{ asset('/dist/css/AdminLTE.css') }}" rel="stylesheet"> --}}
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<!-- page wise style -->
	@yield('page-style')
	
	@if(!empty(setting('fevicon_path')))
	<link rel="icon" href="{{asset(\Storage::url(setting('fevicon_path')))}}"  />
	@else
	<link rel="icon" href="{{asset('images/fevicon.png')}}"  />
	@endif

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div id="progressbar-recommendation" class="pt-loading">
		<div class="loading-progress"></div>
	  </div>
	<div class="wrapper">
		@include('partials.navbar')
			@include('partials.sidebar')
			<div id="app">
				@yield('content')
			</div>
		@include('partials.footer')
		<div class="control-sidebar-bg"></div>
		<script src="{{asset('js/app.js')}}"></script>
		
		<!-- notify js -->
		@include('partials.notify')
		<!-- theme js -->
		{{-- <script src="{{asset('js/theme.js')}}"></script> --}}
		<!-- AdminLTE App -->
		{{-- <script src="{{asset('dist/js/adminlte.min.js')}}"></script> --}}
		<!-- page script -->
		<script src="{{asset('js/main.js')}}"></script>
		@yield('script')
		@include('includes.analytics')
	</div>
</body>
</html>
