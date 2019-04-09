<div class="card border-danger">
	<div class="card-body">
		<h5 class="card-title mb-4 pb-3 border-bottom text-danger">
			<i data-feather="trash-2" class="mr-2"></i>
			Eliminar Registro
		</h5>

		@if (
			method_exists($model, 'trashed') == false ||
			(method_exists($model, 'trashed') && $model->trashed())
		)
			<p>Una vez que se realice esta acción, ya no podrá deshacer la misma.</p>
		@else
			<p>Al presionar este botón, usted estará marcando el registro como <span class="text-danger">Inactivo</span></p>
		@endif
		
		<button
			class="btn btn-danger delete-record"
			@if ($model->willForceDelete())
				data-delete="hard"
			@endif
			data-form="#delete-form-{{ $model->getKey() }}">Eliminar</button>

		<form
			id="delete-form-{{ $model->getKey() }}"
			action="{{ resource('destroy', ['id' => $model->getKey()]) }}"
			method="POST"
			class="d-none">
			@csrf
			@method('DELETE')
		</form>
		
	</div>
	{{-- END card-body --}}
</div>
{{-- END card --}}