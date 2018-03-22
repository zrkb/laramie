@if (isset($customLeftActions) && is_array($customLeftActions) && count($customLeftActions))
	@foreach($customLeftActions as $customAction)
		<a href="{{ route($customAction['route'], ['id' => $item->getKey() ]) }}" class="p-0 text-{{ $customAction['color'] }}" data-toggle="tooltip" data-placement="top" title="{{ $customAction['tooltip'] }}">
			<i data-feather="{{ $customAction['icon'] }}" class="ft"></i>
		</a>
	@endforeach
@endif

@if (!isset($actions) || (isset($actions) && in_array('show', $actions)))
	<a href="/{{ request()->route()->uri() }}/{{ $item->getKey() }}" class="btn p-0 text-primary mr-2" data-toggle="tooltip" data-placement="left" title="Ver Detalle">
		<i data-feather="menu" class="ft"></i>
	</a>
@endif

@if (!isset($actions) || (isset($actions) && in_array('update', $actions)))
	<a href="/{{ request()->route()->uri() }}/{{ $item->getKey() }}/edit" class="btn p-0 text-success mr-2" data-toggle="tooltip" data-placement="top" title="Editar">
		<i data-feather="edit-2" class="ft"></i>
	</a>
@endif

@if (!isset($actions) || (isset($actions) && in_array('delete', $actions)))
	@component('admin::components/destroy', ['item' => $item])
		<a href="/{{ request()->route()->uri() }}" class="btn p-0 text-danger delete-record" data-toggle="tooltip" data-placement="right" title="Eliminar" data-record="{{ $item->getKey() }}" data-record-title="{{ $title ?? $label ?? '' }}">
			<i data-feather="trash-2" class="ft"></i>
		</a>
	@endcomponent
@endif

@if (isset($customRightActions) && is_array($customRightActions) && count($customRightActions))
	@foreach($customRightActions as $customAction)
		<a href="{{ route($customAction['route']) }}" class="text-{{ $customAction['color'] }} p-0" data-toggle="tooltip" data-placement="top" title="{{ $customAction['tooltip'] }}">
			<i data-feather="{{ $customAction['icon'] }}" class="ft"></i>
		</a>
	@endforeach
@endif
