@component('admin::layouts/blank', [
	'title' => $title,
	'pageTitle' => $pageTitle ?? '',
	'superactions' => $superactions ?? '',
	'back' => $back ?? false,
])

	<div class="row mb-5 justify-content-center">
		<div class="col-sm-12">
			<div class="card">
				{{ html()->span()->text('Hello world!')->class('fa fa-eye') }}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endcomponent