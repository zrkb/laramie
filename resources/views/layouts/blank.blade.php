@extends('admin::layouts/master')

@section('content')

	@include('admin::layouts/errors', ['col' => $col ?? 'col-12'])

	<div class="row mb-5">
		<div class="col-md-12">
			{{ $superactions ?? '' }}
			
			<h4 class="page-title">
				{{ $icon ?? '' }}
				{{ $pageTitle ?? 'Blank Page' }}
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	{{ $slot }}

@endsection
