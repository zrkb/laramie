@extends('laramie::layouts/app')

@section('content')

	<div class="root">

		@include('laramie::misc/models/restore-panel', ['model' => $user])

		@component('laramie::misc/page-title')
			@slot('superactions')
				<div class="float-right">
					<a href="{{ resource('edit', ['id' => $user->id]) }}" class="btn btn-success">
						<i data-feather="edit-2" class="mr-2"></i>
						Editar
					</a>
					<a href="{{ resource('index') }}" class="btn btn-default">
						Volver a la lista
					</a>
				</div>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span title="{{ $user->fullName }}">{{ $user->initials }}</span>
				</a>
			@endslot

			<span class="text-primary">#{{ $user->id }}</span>
			<span class="text-muted">&rarr;</span>
			{{ $user->full_name }}
		@endcomponent

		<div class="row mb-5 justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title mb-4 pb-3 border-bottom">
							<i data-feather="layers" class="mr-2 text-primary"></i>
							Datos del Registro
						</h5>

						<div class="form mt-3">
							@modelProperty(['title' => 'Nombre Completo'])
								{{ $user->full_name }}
							@endmodelProperty

							@modelProperty(['title' => 'Email'])
								{{ $user->email }}
							@endmodelProperty

							@modelProperty(['title' => 'Creado'])
								{{ $user->accountAge }}
							@endmodelProperty
						</div>
						{{-- END form --}}
					</div>
					{{-- END card-body --}}
				</div>
				{{-- END card --}}
			</div>
			{{-- END col --}}

			<div class="col-md-4">
				@include('laramie::misc/models/additional-information', ['model' => $user])
			</div>
			{{-- END col --}}
		</div>
		{{-- END row --}}

		@if ($user->id != auth()->user()->id)
			<div class="row mb-5 justify-content-center">
				<div class="col-md-12">
					@include('laramie::misc/models/delete-action', ['model' => $user])
				</div>
				{{-- END col --}}
			</div>
			{{-- END row --}}
		@endif
		
	</div>
	{{-- END root --}}

@endsection