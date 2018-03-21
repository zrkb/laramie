@component('admin::layouts/blank', [
	'back' => $back ?? false
])

	<div class="row mb-5">
		<div class="col">
			{{ $superactions ?? '' }}
			
			<h4 class="page-title">
				{{ $icon ?? '' }}
				{{ $title ?? 'Blank Page' }}
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5 justify-content-center">
		<div class="{{ $col ?? 'col' }}">
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

@endcomponent