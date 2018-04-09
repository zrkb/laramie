<table class="table table-striped datatable">
	<thead>
		<tr>
			@foreach($columns as $column)
				<th>{{ $column->header }}</th>
			@endforeach

			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $item)
			<tr>
				@foreach($columns as $column)
					<td>
						@if ($column->isLinkable())
							@include('admin::widgets/linkable', [
								'initials' => $item->initials,
								'item' => $item,
								'field' => $column->field,
							])
						@else
							{{ $item->{$column->field} }}
						@endif
					</td>
				@endforeach

				<td class="text-center">
					@include('admin::components.actions', ['item' => $item])
				</td>
			</tr>
		@endforeach
	</tbody>
</table>