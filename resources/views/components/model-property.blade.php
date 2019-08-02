<div class="form-group">
	@isset($title)
		<div class="model-property">
			{{ $title }}
		</div>
	@endisset
	
	<p class="form-control-static form-property-static text-dark">{{ $slot }}</p>
</div>