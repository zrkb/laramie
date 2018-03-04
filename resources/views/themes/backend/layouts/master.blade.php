<!DOCTYPE html>
<html class="js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Laramie — Dashboard</title>

	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="@imfx">

	<link rel="shortcut icon" href="/favicon.ico">

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

	@include('layouts/footer')
	@include('layouts/scripts')

</body>
</html>