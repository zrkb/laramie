@extends('admin::layouts/master')

@section('content')

	<div class="row mb-5">
		<div class="col">
			{{ $superactions }}
			
			<h4 class="page-title">
				{{ $title ?? 'Blank Page' }}
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col">
			@if (isset($cardTitle))
				<h5 class="card-title">{{ $cardTitle }}</h5>
			@endif

			<div class="card">
				<div class="card-body">
					{{ $slot }}
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection
