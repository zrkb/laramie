@isset($segments)
	<select class="form-control form-segment-dropdown" onchange="var selected = this.options[this.selectedIndex].value; window.location = '{{ resource('index') }}?segment=' + selected;">
		@foreach($segments as $key => $segment)
			<option value="{{ $segment->key() }}" {{ $segment->isActive() ? 'selected' : '' }}>
				{{ $segment->name }}
			</option>
		@endforeach
	</select>
@endisset