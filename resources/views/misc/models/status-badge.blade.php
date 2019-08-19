@if ($model->hasSoftDelete())
	@if ($model->trashed())
		<span class="badge badge-soft-danger">Inactivo</span>
	@else
		<span class="badge badge-soft-success">Activo</span>
	@endif
@else
	<span class="text-muted">-- no soft delete --</span>
@endif
