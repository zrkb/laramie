<!DOCTYPE html>
<html class="js" lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{ isset($title) ? $title  . ' | ' : '' }} Laramie</title>

	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="@imfx">

	@include('layouts/favicons')
	@include('layouts/styles')
</head>

<body>

	@include('layouts/flash')

    @auth
		@include('layouts/nav')
		@include('layouts/menu')
    @endauth

	<div class="container mt-5">
		@yield('content')
	</div>

	@auth
		@include('layouts/footer')
	@endauth

	@include('layouts/scripts')

</body>
</html>