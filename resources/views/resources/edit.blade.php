@extends('laramie::layouts/app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-12 col-lg-10 col-xl-8">
			@component('laramie::misc/page-title')
				@slot('superactions')
					@include('laramie::components/back-to-resource')
				@endslot

				Editar {{ $resource->singularLabel() }}
			@endcomponent

           	@include('laramie::layouts/errors')
    		@include('laramie::layouts/flash')

			{{ form()->model($item, ['route' => [$resource::uriKey() . '.update', $item->id], 'method' => 'PUT']) }}
			
				@include($resource->viewForForm, [
					'fields' => $resource->updateFields(),
				])

				<hr>

				<div class="form-group">
					<a href="{{ resource('index') }}" class="btn btn-white mr-2">
						@lang('laramie::resource.cancel-form-button')
					</a>

					<button type="submit" class="btn btn-primary btn-activity">
						@lang('laramie::resource.submit-form-button')
					</button>
				</div>

			{{ form()->close() }}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection
