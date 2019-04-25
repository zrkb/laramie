@extends('laramie::layouts/app')

@section('content')

	<div class="root">
		@component('laramie::misc/page-title')
			@slot('superactions')
				<div class="float-right">
					<a href="{{ resource('index') }}" class="btn btn-default">
						Volver a la lista
					</a>
				</div>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span class="bg-primary text-white">
						<i data-feather="star" class="feather"></i>
					</span>
				</a>
			@endslot

			Nuevo Rol
		@endcomponent

		{{ form()->open(['route' => 'roles.store']) }}
		
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4 pb-3 border-bottom">
						<i data-feather="terminal" class="mr-2 text-primary"></i>
						Completa los campos del formulario
					</h5>

					@include('laramie::roles/form')

					<div class="form-group mt-5 mb-3">
						<a href="{{ resource('index') }}" class="btn btn-default mr-2">Cancelar</a>

						<button type="submit" class="btn btn-primary btn-activity">
							Guardar
						</button>
					</div>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}

		{{ form()->close() }}
	</div>
	{{-- END root --}}

@endsection