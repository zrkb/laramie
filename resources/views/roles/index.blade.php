@extends('layouts/table')

@section('content')

	<div class="root">
		@component('misc/page-title')
			@slot('superactions')
				<a href="{{ resource('create') }}" class="btn btn-primary">
					Añadir 
					<i data-feather="plus" class="feather"></i>
				</a>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span class="bg-primary text-white">
						<i data-feather="star" class="feather"></i>
					</span>
				</a>
			@endslot

			Roles
			<small class="text-muted">({{ $roles->count() }})</small>
		@endcomponent

		@include('misc/table-tools')

		<div class="card">
			@if ($roles->isNotEmpty())
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<tr>
								<th class="tid">#ID</th>
								<th>Nombre</th>
								<th>Creado</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
								<tr>
									<td class="tid">{{ $role->id }}</td>
									<td>
										<a href="{{ resource('show', ['id' => $role->id]) }}">
											{{ $role->name }}
										</a>
									</td>
									<td>
										{{ $role->created_at }}
									</td>
									<td class="actions text-center">
										@include('misc/models/crud-actions', ['model' => $role])
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{-- END datatables --}}
				</div>
				{{-- END table-responsive --}}
			@else
				@include('layouts/empty', [
					'route' => resource('create'),
				])
			@endif
		</div>
		<!-- END card -->
	</div>
	{{-- END root --}}

@endsection