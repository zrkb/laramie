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
			<small class="text-muted">({{ $users->count() }})</small>
		@endcomponent

		@include('laramie::misc/table-tools')

		<div class="card">
			@if ($users->isNotEmpty())
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
							@foreach($users as $user)
								<tr>
									<td class="tid">{{ $user->id }}</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="{{ $user->full_name }}">
												{{ $user->initials }}
											</span>
										</div>
										<a href="{{ resource('show', ['id' => $user->id]) }}">
											@if ($user->trashed())
												<s class="text-muted">{{ $user->full_name }}</s>
											@else
												{{ $user->full_name }}
											@endif
										</a>
									</td>
									<td>
										{{ $user->email }}
									</td>
									<td>
										@foreach($user->roles as $role)
											<span class="badge badge-secondary">{{ $role->name }}</span>
										@endforeach
									</td>
									<td>
										@include('laramie::misc/models/status-badge', ['model' => $user])
									</td>
									<td class="actions text-center">
										@include('laramie::misc/models/crud-actions', ['model' => $user])
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