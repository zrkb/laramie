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

	@include('admin::layouts/favicons')
	@include('admin::layouts/styles')
</head>

<body>

	@include('admin::layouts/flash')

    @auth
		@include('admin::layouts/nav')
		@include('admin::layouts/menu')
    @endauth

	<div class="container mt-5">
		@yield('content')
	</div>

	@auth
		@include('admin::layouts/footer')
	@endauth

	@include('admin::layouts/scripts')

</body>
</html>