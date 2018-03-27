@component('admin::layouts/blank', [
	'title' => $title,
	'pageTitle' => $pageTitle ?? '',
	'superactions' => $superactions ?? '',
	'back' => $back ?? false,
])

	<div class="row mb-5 justify-content-center">
		<div class="col-sm-12">
			<div class="card">
				{{ html()->form()->action(route(resource('store')))->open() }}

					<div class="card-body">
						<h5 class="card-title mb-4 pb-3 border-bottom">
							<i data-feather="terminal" class="ft mr-2 text-primary"></i>
							Completa los campos del formulario
						</h5>
						
						@include('admin::crud/form')
					</div>
					{{-- END card-body --}}

					<div class="card-footer">
						@include('admin::components/submit')
					</div>
					{{-- END card-footer --}}
					
				{{ html()->form()->close() }}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endcomponent