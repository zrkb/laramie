@extends('admin::layouts/master')

@section('app')
	@include('admin::layouts/nav')

	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					@include('admin::layouts/sidebar')
				</div>
			</nav>
			<!-- END nav -->

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">
				@include('admin::layouts/flash')
				@include('admin::layouts/errors')

				@yield('content')
			</main>
			<!-- END main -->
		</div>
		<!-- END row -->
	</div>
	<!-- END container-fluid -->
@endsection