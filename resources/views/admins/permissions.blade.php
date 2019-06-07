@if (
	(isset($admin) == false && admin()->can('add_users')) ||
	(isset($admin) && $admin->id != admin()->id && admin()->can('edit_users'))
)
	<div class="form-group">
		{{ Form::label('roles', 'Roles', ['class' => 'control-label']) }}

		<div class="permissions-checkbox">
			@foreach ($roles as $role)

				@php
					$adminHasRole = false;

					if (isset($admin)) {
						$assignedRoles = $admin->roles->pluck('id')->toArray();
						$adminHasRole = in_array($role->id, $assignedRoles);
					}
				@endphp

				<div class="checkbox">
					<label for="role-{{ $role->id }}">
						{{ form()->checkbox('role[]', $role->id, $adminHasRole ?? false(), ['id' => "role-{$role->id}"]) }}
						<span>
							{{ $role->name }}
						</span>
					</label>
				</div>
			@endforeach
		</div>
	</div>
@endif