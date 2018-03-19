@component('admin::layouts/blank', ['title' => $title])

	@slot('superactions')
		<div class="float-right">
			<button type="button" class="btn btn-success">
				Añadir {{ $label }}
			</button>
		</div>
	@endslot

	<table class="table table-striped datatable">
		<thead>
			<tr>
				@foreach ($items->first()->getFields() as $field => $label)
					<th>{{ $label }}</th>
				@endforeach

				<th class="text-center">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($items as $item)
				<tr>
					@foreach($item->getFields() as $field => $label)
						<td>{{ $item->getAttribute($field) }}</td>
					@endforeach

					<td class="text-center">
						@include('admin::components.actions', [
							'resource' => request()->route()->uri(),
							'record' => $item->getKey()
						])
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endcomponent