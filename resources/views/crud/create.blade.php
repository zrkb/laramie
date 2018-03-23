@component('admin::layouts/blank', [
	'title' => $title,
	'pageTitle' => $pageTitle ?? '',
	'superactions' => $superactions ?? '',
	'back' => $back ?? false,
])

	<div class="row mb-5 justify-content-center">
		<div class="col-sm-6">
			<div class="card">
				<form action="{{ route(resource('store'))}}" method="POST">
					<div class="card-body">
						<h5 class="card-title mb-4 pb-3 border-bottom">
							<i data-feather="terminal" class="ft mr-2 text-primary"></i>
							Completa los campos del formulario
						</h5>

						{{ csrf_field() }}
						
						@include('admin::crud/form')
					</div>
					{{-- END card-body --}}

					<div class="card-footer">
						@include('admin::components/submit')
					</div>
				</form>
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endcomponent