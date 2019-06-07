@extends('laramie::layouts/table')

@section('content')

	<div class="root">
		@component('laramie::misc/page-title')
			@slot('superactions')
				@include('laramie::misc/models/segments')

				<a href="{{ resource('create') }}" class="btn btn-primary">
					Añadir 
					<i data-feather="plus" class="feather"></i>
				</a>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span class="bg-primary text-white">
						<i data-feather="user" class="feather"></i>
					</span>
				</a>
			@endslot

			Usuarios
			<small class="text-muted">({{ $admins->count() }})</small>
		@endcomponent

		@include('laramie::misc/table-tools')

		<div class="card">
			@if ($admins->isNotEmpty())
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<tr>
								<th class="tid">#ID</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Permisos</th>
								<th>Estado</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($admins as $admin)
								<tr>
									<td class="tid">{{ $admin->id }}</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="{{ $admin->fullname }}">
												{{ $admin->initials }}
											</span>
										</div>
										<a href="{{ resource('show', ['id' => $admin->id]) }}">
											@if ($admin->trashed())
												<s class="text-muted">{{ $admin->fullname }}</s>
											@else
												{{ $admin->fullname }}
											@endif
										</a>
									</td>
									<td>
										{{ $admin->email }}
									</td>
									<td>
										@foreach($admin->roles as $role)
											<span class="badge badge-secondary">{{ $role->name }}</span>
										@endforeach
									</td>
									<td>
										@include('laramie::misc/models/status-badge', ['model' => $admin])
									</td>
									<td class="actions text-center">
										@include('laramie::misc/models/crud-actions', ['model' => $admin])
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{-- END datatables --}}
				</div>
				{{-- END table-responsive --}}
			@else
				@include('laramie::layouts/empty', [
					'route' => resource('create'),
				])
			@endif
		</div>
		<!-- END card -->
	</div>
	{{-- END root --}}

@endsection