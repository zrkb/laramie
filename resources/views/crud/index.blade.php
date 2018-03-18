@component('admin::layouts/blank', ['title' => 'Usuarios'])

	<table class="table datatable">
		<thead>
			<tr>
				@foreach ($items->first()->getFields() as $field => $label)
					<th>{{ $label }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($items as $item)
				<tr>
					@foreach($item->getFields() as $field => $label)
						<td>{{ $item->{$field} }}</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endcomponent