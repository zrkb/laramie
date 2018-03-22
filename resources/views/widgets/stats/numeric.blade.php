<div class="{{ $col ?? 'col-xs-12 col-md-6 col-lg-6 col-xl-3 mb-3'}}"
	@if(isset($tooltip))
		{!! html()->tooltip(['title' => $tooltip]) !!}
	@endif>
	<div class="card">
		<div class="card-body text-center pt-4 pb-4">
			<h1 class="mt-3">{{ $value }}</h1>
			<h6 class="text-muted">
			<i data-feather="{{ $icon ?? 'circle' }}" class="text-success ft mr-2"></i>{{ $title }}</h6>
		</div>
	</div>
</div>
{{-- END col --}}