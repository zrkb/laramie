@component('admin::layouts/blank', [
	'title' => $title,
	'header' => $title,
])

	@slot('superactions')
		<div class="float-right">
			<a href="{{ route(resource('create')) }}" class="btn btn-success">
				<i data-feather="plus" class="mr-2 ft"></i>
				Añadir 
			</a>
		</div>
	@endslot

	<div class="row mb-5 justify-content-center">
		<div class="{{ $col ?? 'col' }}">

			<div class="card">
				<div class="card-body">
					@if (isset($cardTitle))
						<h5 class="card-title mb-4 pb-3 border-bottom">
							{{ $cardTitle }}
						</h5>
					@endif

					{{ $slot }}
				</div>
				{{-- END card-body --}}

				@if (isset($cardFooter))
					<div class="card-footer">
						{{ $cardFooter }}
					</div>
				@endif
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endcomponent