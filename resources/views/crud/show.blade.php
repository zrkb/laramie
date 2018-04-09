@component('admin::layouts/blank', [
	'title' => $title,
	'back' => true,
])

	@slot('icon')
		<a class="page-icon">
			<span title="{{ $item->fullName }}">{{ $item->initials }}</span>
		</a>
	@endslot

	@slot('header')
		<span class="text-primary">#{{ $item->getKey() }}</span>
		<span class="text-muted">&rarr;</span>
		{{ $item->fullName }}
	@endslot

	@slot('superactions')
		<div class="float-right">
			<button type="button" class="btn btn-success">
				<i data-feather="edit-2" class="ft mr-2"></i>
				Editar
			</button>
		</div>
	@endslot

	<div class="row mb-5 justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4 pb-3 border-bottom">
						<i data-feather="layers" class="ft mr-2 text-primary"></i>
						Datos del Registro
					</h5>

					<div class="form mt-3">
						@foreach($fields as $field)
							<div class="form-group">
								<label>{{ $field->label }}</label>
								<p class="form-control-static">{{ $item->{$field->name} }}</p>
							</div>
						@endforeach

						{{ $slot }}
					</div>
					{{-- END form --}}
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}

		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4 pb-3 border-bottom">
						<i data-feather="info" class="ft mr-2 text-primary"></i>
						Información Adicional
					</h5>

					<div class="form mt-3">
						<div class="form-group">
							<label>Creado</label>
							<p class="form-control-static">
								{{ $item->created_at->formatLocalized('%B %d, %Y @ %H:%mhs') }}
							</p>
						</div>

						<div class="form-group">
							<label>Modificado</label>
							<p class="form-control-static">
								{{ $item->updated_at->formatLocalized('%B %d, %Y @ %H:%mhs') }}
							</p>
						</div>

						@if ($item->hasSoftDelete())
							<div class="form-group">
								<label>Estado</label>
								<p class="form-control-static">
									@if($item->isActive())
										<span class="badge badge-success">Activo</span>
									@else
										<span class="badge badge-danger">Inactivo</span>
									@endif
								</p>
							</div>
						@endif
					</div>
					{{-- END form --}}
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5 justify-content-center">
		<div class="col-md-12">
			<div class="card border-danger">
				<div class="card-body">
					<h5 class="card-title mb-4 pb-3 border-bottom">
						<i data-feather="trash-2" class="ft mr-2 text-danger"></i>
						Borrar Registro
					</h5>

					<p>Una vez que realice esta acción, ya no se podrá deshacer.</p>
					
					@component('admin::components/destroy', ['item' => $item])
						<button class="btn btn-danger delete-record" data-record="{{ $item->getKey() }}" data-record-title="{{ $title ?? $label ?? $record ?? '' }}">Eliminar</button>
					@endcomponent
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}
	
@endcomponent