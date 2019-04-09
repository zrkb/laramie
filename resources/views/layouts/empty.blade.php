<div class="page-loading mt-4 text-center">

	@isset($icon)
		<h1 class="h1 text-primary">
			<i data-feather="{{ $icon }}" style="width: 50px; height: 50px;"></i>
		</h1>
	@endisset

	<h3 class="page-loading-title">{{ $message ?? 'No se encontraron resultados' }}</h3>

	<p class="page-loading-description mb-5">
		<span class="mb-4 d-block">
			@if (isset($description))
				{{ $description }}
			@else
				Puedes agregar más items haciendo <br>click en el botón de abajo.
			@endif
		</span>
		
		@isset($route)
			<a href="{{ $route }}" class="btn btn-primary btn-block">
				Añadir
			</a>
		@endisset
	</p>
</div>