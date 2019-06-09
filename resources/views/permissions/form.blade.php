<div class="form-group">
	{{ form()->label('name', 'Nombre', ['class' => 'control-label']) }}
	{{ form()->text('name', null, ['class' => 'form-control']) }}
</div>

{{ form()->hidden('guard_name', 'admin', ['class' => 'form-control']) }}

<div class="form-group">
	{{ form()->label('actions', 'Acciones', ['class' => 'control-label']) }}

	{{ old('actions[]') }}

	@foreach($actions as $action => $label)
		<div class="checkbox">
			<label for="action_{{ $action }}">
				{{ form()->checkbox("actions[{$action}]", $action, true, ['id' => "action_{$action}"]) }}
				<span>
					{{ $label }}
				</span>
			</label>
		</div>
	@endforeach
</div>