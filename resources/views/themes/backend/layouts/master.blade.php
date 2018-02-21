<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
	<meta name="author" content="@imfx">

	<link rel="shortcut icon" href="/favicon.ico">

	<title>Laramie — Dashboard</title>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ theme_url('assets/fonts/fonts.css?' . time()) }}">
	<link rel="stylesheet" href="{{ theme_url('assets/fonts/fontawesome.min.css?' . time()) }}">

	<!-- App Style -->
	<link rel="stylesheet" href="{{ theme_url('assets/css/app.css?' . time()) }}">
	<link rel="stylesheet" href="{{ theme_url('assets/css/custom.css?' . time()) }}">

	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
	<![endif]-->

	@stack('styles')

	<!-- Icons -->
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
</head>

<body>

	@include('layouts/nav')
	@include('layouts/menu')

	<div class="container">
		@yield('content')
	</div>

	@include('layouts/scripts')
</body>
</html>