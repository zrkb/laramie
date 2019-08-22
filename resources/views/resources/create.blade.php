@extends('laramie::layouts/app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-12 col-lg-10 col-xl-8">

			@component('laramie::misc/page-title')
				@slot('superactions')
					@include('laramie::components/back-to-resource')
				@endslot

				Crear {{ $resource->singularLabel() }}
			@endcomponent

        	@include('laramie::layouts/errors')
    		@include('laramie::layouts/flash')

			{{ form()->open(['url' => resource('store'), 'method' => 'post']) }}
			
				<div class="card">
					<div class="card-body">
						
						@include($resource->viewForForm, [
							'fields' => $resource->creationFields(),
						])

						<div class="form-group mt-5 mb-3">
							<a href="{{ resource('index') }}" class="btn btn-white mr-2">
								@lang('laramie::resource.cancel-form-button')
							</a>

							<button type="submit" class="btn btn-primary btn-activity">
								@lang('laramie::resource.submit-form-button')
							</button>
						</div>
					</div>
					{{-- END card-body --}}
				</div>
				{{-- END card --}}

			{{ form()->close() }}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection
