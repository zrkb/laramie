@extends('admin::layouts/master')

@section('content')

	<div class="row mb-5">
		<div class="col">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<span class="mr-1"><i class="fa fa-check"></i></span>
					Settings
				</button>
			</div>

			<h4 class="page-title">
				<a class="page-icon" href="">
					{{-- <img src="assets/img/avatars/quaver.svg" title="Felix Ayala"> --}}
					<span title="Felix Ayala">TP</span>
				</a>
				Typography
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 mb-3">
			<div class="card border-success">
				<div class="card-body">
					<i data-feather="bar-chart-2" class="float-right text-muted"></i>
					<h6 class="text-muted text-uppercase">Orders</h6>
					<h3 class="mt-3 mb-4">1,587</h3>
					<span class="badge badge-success">+11%</span>
					<span class="text-muted float-right">From previous period</span>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 mb-3">
			<div class="card border-danger">
				<div class="card-body">
					<i data-feather="dollar-sign" class="float-right text-muted"></i>
					<h6 class="text-muted text-uppercase">Revenue</h6>
					<h3 class="mt-3 mb-4">46,782</h3>
					<span class="badge badge-danger">-29%</span>
					<span class="text-muted float-right">From previous period</span>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 mb-3">
			<div class="card border-warning">
				<div class="card-body">
					<i data-feather="folder" class="float-right text-muted"></i>
					<h6 class="text-muted text-uppercase">Average Price</h6>
					<h3 class="mt-3 mb-4">15.9</h3>
					<span class="badge badge-warning">0%</span>
					<span class="text-muted float-right">From previous period</span>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 mb-3">
			<div class="card border-custom">
				<div class="card-body">
					<i data-feather="folder" class="float-right text-muted"></i>
					<h6 class="text-muted text-uppercase">Product Sold</h6>
					<h3 class="mt-3 mb-4">1,890</h3>
					<span class="badge badge-custom">+89%</span>
					<span class="text-muted float-right">Last Year</span>
				</div>
			</div>
		</div>
	</div>
	<!-- END row -->

@endsection