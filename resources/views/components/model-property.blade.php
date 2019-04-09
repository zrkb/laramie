<div class="form-group">
	@isset($title)
		<label><span class="text-muted">&rarr;</span> <span class="text-black-50">{{ $title }}</span></label>
	@endisset
	
	<p class="form-control-static form-property-static">{{ $slot }}</p>
</div>