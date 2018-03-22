@component('admin::layouts/blank', ['title' => $title])

	@slot('superactions')
		<div class="float-right">
			<a href="" class="btn btn-success">
				<i data-feather="plus" class="mr-2 ft"></i>
				Añadir 
			</a>
		</div>
	@endslot

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
						<a href="{{ route(resource() . '.show', ['id' => $item->id]) }}">{{ $item->fullName }}</a>
					</td>
					<td>{{ $item->email }}</td>
					<td>{{ $item->accountAge }}</td>

					<td class="text-center">
						@include('admin::components.actions', [
							'resource' => request()->route()->uri(),
							'record' => $item->getKey()
						])
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endcomponent