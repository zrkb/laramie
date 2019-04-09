<div class="form-group">
	{{ form()->label('name', 'Nombre', ['class' => 'control-label']) }}
	{{ form()->text('name', null, ['class' => 'form-control']) }}
</div>

{{ form()->hidden('guard_name', 'web', ['class' => 'form-control']) }}

<div class="form-group">
	<table class="table">
		<thead>
			<tr>
				<th class="w-50">Permisos</th>
				<th class="text-center" style="width: 12.5%">Ver</th>
				<th class="text-center" style="width: 12.5%">Agregar</th>
				<th class="text-center" style="width: 12.5%">Modificar</th>
				<th class="text-center" style="width: 12.5%">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($permissions as $name => $actions)
				<tr>
					<td>
						<strong>{{ str_slug($name) }}</strong>
					</td>
					@foreach($actions as $action)

						@php
							$roleHasPermission = isset($role) ? $role->hasPermissionTo($action->name) : false;
						@endphp

						<td class="text-center">
							<div class="checkbox">
								<label class="m-0">
									{{ form()->checkbox('permissions[]', $action->name, $roleHasPermission) }}
									<span></span>
								</label>
							</div>
						</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</div>