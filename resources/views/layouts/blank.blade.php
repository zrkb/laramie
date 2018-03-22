@extends('admin::layouts/master')

@section('content')

	<div class="row mb-5">
		<div class="col">
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
