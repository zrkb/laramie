<table class="table table-striped datatable">
	<thead>
		<tr>
			@foreach($columns as $column)
				<th>{{ $column }}</th>
			@endforeach

			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $item)
			<tr>
				@foreach($fields as $field)
					<td>{{ $item->{$field} }}</td>
				@endforeach

				<td class="text-center">
					@include('admin::components.actions', ['item' => $item])
				</td>
			</tr>
		@endforeach
	</tbody>
</table>