<div class="row mb-4 justify-content-center">
	@include('admin::widgets.stats.numeric', [
		'icon' => 'user-check',
		'title' => 'Accesos',
		'value' => '15',
		'tooltip' => 'Cantidad de veces que ingresó al sistema.',
	])

	@include('admin::widgets.stats.numeric', [
		'icon' => 'activity',
		'title' => 'Actividades',
		'value' => '27',
		'tooltip' => 'Cantidad de acciones realizadas.',
	])
</div>
{{-- END row --}}