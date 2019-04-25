<div class="card">
	<div class="card-body">
		<h5 class="card-title mb-4 pb-3 border-bottom">
			<i data-feather="info" class="mr-2 text-primary"></i>
			Información Adicional
		</h5>

		@modelProperty(['title' => 'Creado el'])
			{{ $model->created_at->formatLocalized('%B %d, %Y @ %H:%mhs') }}
		@endmodelProperty

		@modelProperty(['title' => 'Última Modificación'])
			{{ $model->updated_at->formatLocalized('%B %d, %Y @ %H:%mhs') }}
		@endmodelProperty

		@if (method_exists($model, 'trashed'))
			@modelProperty(['title' => 'Estado'])
				@include('laramie::misc/models/status-badge')
			@endmodelProperty
		@endif
	</div>
	{{-- END card-body --}}
</div>
{{-- END card --}}