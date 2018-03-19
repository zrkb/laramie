@if (isset($customLeftActions) && is_array($customLeftActions) && count($customLeftActions))
	@foreach($customLeftActions as $customAction)
		<a href="{{ route($customAction['route'], ['user' => $record ]) }}" class="p-0 text-{{ $customAction['color'] }}" data-toggle="tooltip" data-placement="top" title="{{ $customAction['tooltip'] }}">
			<i data-feather="{{ $customAction['icon'] }}" class="ft"></i>
		</a>

		&nbsp;&nbsp;
	@endforeach
@endif

@if (!isset($actions) || (isset($actions) && in_array('show', $actions)))
	<a href="/{{ $resource }}/{{ $record }}" class="btn p-0 text-primary mr-2" data-toggle="tooltip" data-placement="left" title="Ver Detalle">
		<i data-feather="menu" class="ft"></i>
	</a>

	&nbsp;&nbsp;
@endif

@if (!isset($actions) || (isset($actions) && in_array('update', $actions)))
	<a href="/{{ $resource }}/{{ $record }}/edit" class="btn p-0 text-success mr-2" data-toggle="tooltip" data-placement="top" title="Editar">
		<i data-feather="edit-2" class="ft"></i>
	</a>

	&nbsp;&nbsp;
@endif

@if (!isset($actions) || (isset($actions) && in_array('delete', $actions)))
	<a href="/{{ $resource }}" class="btn p-0 text-danger" data-toggle="tooltip" data-placement="right" title="Eliminar" data-record="{{ $record }}" data-record-title="{{ $title ?? $label ?? $record ?? '' }}">
		<i data-feather="trash-2" class="ft"></i>
	</a>

	<form id="delete-form-{{ $record }}" action="/{{ $resource }}/{{ $record }}" method="POST" style="display: none;">
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
	</form>
@endif

@if (isset($customRightActions) && is_array($customRightActions) && count($customRightActions))
	@foreach($customRightActions as $customAction)
		<a href="{{ route($customAction['route']) }}" class="text-{{ $customAction['color'] }} p-0" data-toggle="tooltip" data-placement="top" title="{{ $customAction['tooltip'] }}">
			<i data-feather="{{ $customAction['icon'] }}" class="ft"></i>
		</a>
		
		&nbsp;&nbsp;
	@endforeach
@endif
