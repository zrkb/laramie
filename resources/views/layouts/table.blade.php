@extends('layouts/app')

@section('content')
	
	@include('misc/scripts/datatables')
	@yield('content')

@endsection