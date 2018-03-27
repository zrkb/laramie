<a class="pt-2 pb-2 pl-3 pr-3" tabindex="0" href="javascript:;" data-toggle="popover" data-popover-content="#popover-html-{{ $item->getKey() }}" data-placement="right">
	<i data-feather="more-horizontal" class="ft"></i>
</a>

<div id="popover-html-{{ $item->getKey() }}" class="d-none">
	<div class="popover-body">
		<div class="p-2">
			
			@if (isset($customLeftActions) && is_array($customLeftActions) && count($customLeftActions))
				@foreach($customLeftActions as $customAction)
					<a href="{{ route($customAction['route'], ['id' => $item->getKey() ]) }}" class="p-0 text-{{ $customAction['color'] }}" data-toggle="tooltip" data-placement="top" title="{{ $customAction['tooltip'] }}">
						<i data-feather="{{ $customAction['icon'] }}" class="ft"></i>
					</a>
				@endforeach
			@endif

			@if (!isset($actions) || (isset($actions) && in_array('show', $actions)))
				<a href="/{{ request()->route()->uri() }}/{{ $item->getKey() }}" class="btn p-0 text-primary" data-toggle="123" data-placement="left" title="Ver Detalle">
					<i data-feather="eye" class="ft"></i>
				</a>
			@endif

			<br>
			<br>

			@if (!isset($actions) || (isset($actions) && in_array('update', $actions)))
				<a href="/{{ request()->route()->uri() }}/{{ $item->getKey() }}/edit" class="btn p-0 text-success" data-toggle="123" data-placement="top" title="Editar">
					<i data-feather="edit-2" class="ft"></i>
				</a>
			@endif

			<br>
			<br>

			@if (!isset($actions) || (isset($actions) && in_array('delete', $actions)))
				@component('admin::components/destroy', ['item' => $item])
					<a href="/{{ request()->route()->uri() }}" class="btn p-0 text-danger delete-record" data-toggle="123" data-placement="right" title="Eliminar" data-record="{{ $item->getKey() }}" data-record-title="{{ $title ?? $label ?? '' }}">
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
		</div>
	</div>
</div>