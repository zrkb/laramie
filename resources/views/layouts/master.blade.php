<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	{{-- Required meta tags --}}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	{{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{ isset($title) ? $title  . ' -' : '' }} {{ env('APP_NAME', 'Laramie') }}</title>

	@include('admin::layouts/styles')
</head>

<body>

	<div id="app">
		@yield('app')
	</div>

	@include('admin::layouts/scripts')
</body>
</html>