<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
<link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>{{ config('app.name', 'Cliníca IOPA') }}</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="description" content="" />
	<meta property="og:site_name" content="Clínica oftalmológica IOPA" />
	<meta property="og:title" content="Clínica oftalmológica IOPA" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('front/css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    @include('front.shared.header')

    @yield('content')

	@include('front.shared.footer')
	

<script type="text/javascript" src="{{ asset('front/js/front.min.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
<script type="text/javascript" src="{{ asset('front/js/main.min.js') }}"></script>

</body>
</html>