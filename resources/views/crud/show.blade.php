@component('admin::layouts/blank', [
	'back' => true
])

	@include('admin::users.stats')

	@slot('icon')
		<a class="page-icon">
			<span title="{{ $item->fullName }}">{{ $item->initials }}</span>
		</a>
	@endslot

	@slot('title')
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
			<button type="button" class="btn btn-danger">
				<i data-feather="trash-2" class="ft"></i>
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
						<div class="form-group">
							<label>Nombre Completo</label>
							<p class="form-control-static">Felix Ayala</p>
						</div>

						<div class="form-group">
							<label>Email</label>
							<p class="form-control-static">felix@agenciamoderna.com.py</p>
						</div>

						<div class="form-group">
							<label>Roles</label>
							<p class="form-control-static">
								<span class="badge badge-secondary">Developer</span>
								<span class="badge badge-secondary">Admin</span>
							</p>
						</div>
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
							<label>Creado el</label>
							<p class="form-control-static">Miércoles 4, Abril 1990 @ 21:00hs</p>
						</div>

						<div class="form-group">
							<label>Modificado el</label>
							<p class="form-control-static">Lunes 20, Octubre 2014 @ 09:21hs</p>
						</div>

						<div class="form-group">
							<label>Estado</label>
							<p class="form-control-static">
								<span class="badge badge-success">Activo</span>
							</p>
						</div>
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

@endcomponent