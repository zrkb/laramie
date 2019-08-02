<div class="card">
	<div class="card-body">
		<h5 class="card-title mb-4 pb-3 border-bottom">
			<i class="bx bx-info-circle text-primary mr-2"></i>
			Información Adicional
		</h5>

		@modelProperty(['title' => 'Creado el'])
			{{ $model->created_at->formatLocalized('%d de %B de %Y, %H:%mhs') }}
		@endmodelProperty

		@modelProperty(['title' => 'Última Modificación'])
			{{ $model->updated_at->formatLocalized('%d de %B de %Y, %H:%mhs') }}
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