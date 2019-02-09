<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="">
    <link rel="icon" type="image/png" href=""> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>{{ config('app.name', 'Cliníca IOPA') }}</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="description" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link href="{{ asset('front/css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    @include('front.shared.header')

    @yield('content')

	@include('front.shared.footer')
	

<script type="text/javascript" src="{{ asset('front/js/front.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/main.min.js') }}"></script>

</body>
</html>