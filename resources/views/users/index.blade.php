@component('admin::layouts/blank', [
	'title' => $title,
	'pageTitle' => $title,
])

	@slot('superactions')
		<div class="float-right">
			<a href="{{ route(resource('create')) }}" class="btn btn-success">
				<i data-feather="plus" class="mr-2 ft"></i>
				Añadir 
			</a>
		</div>
	@endslot

	<div class="row mb-5 justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped datatable">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nombre Completo</th>
								<th>Email</th>
								<th>Fecha de Creación</th>

								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($items as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>
										<div class="user-avatar mr-2">
											<span class="no-image-user" title="{{ $item->fullName }}">{{ $item->initials }}</span>
										</div>
										<a href="{{ route(resource() . '.show', ['id' => $item->getKey()]) }}">{{ $item->fullName }}</a>
									</td>
									<td>{{ $item->email }}</td>
									<td>{{ $item->accountAge }}</td>

									<td class="text-center">
										@include('admin::components.actions', ['item' => $item])
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}
	
@endcomponent