@component('admin::layouts/blank', [
	'title' => $title,
	'back' => $back,
	'pageTitle' => $pageTitle,
	'icon' => $icon,
])

	{{ $stats ?? '' }}

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
							<p class="form-control-static">
								{{ $item->created_at->formatLocalized('%B %d, %Y @ %H:%mhs') }}
							</p>
						</div>

						<div class="form-group">
							<label>Modificado el</label>
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

					<button class="btn btn-danger delete-modal-action">Eliminar</button>
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	@push('scripts')
		<script type="text/javascript">
			jQuery(document).ready(function($){

				$('.delete-modal-action').on('click', function() {

					var record = $(this).data('record');

					var dialog = bootbox.dialog({
						'title': 'Atención!',
						'message': 'Esta acción no se puede deshacer. Todos los elementos asociados a este registro serán eliminados.',
						'callback': function(result) {
							console.log(result);
						},
						'buttons': {
							'cancelar': {
								'label': 'Cancelar',
								'className': 'btn-default btn-cancel-modal',
								'callback': function() {
								}
							},
							'confirmar': {
								'label': 'Sí, eliminar registro',
								'className': 'btn-danger btn-loading',
								'callback': function() {
									return false;
								}
							}
						},
						'animate': false
					});

					dialog.init(function(){
						window.loadingButton();
					});
				});
			});
		</script>
	@endpush

@endcomponent