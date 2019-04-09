@if (
	(isset($user) == false && auth()->user()->can('add_users')) ||
	(isset($user) && $user->id != auth()->user()->id && auth()->user()->can('edit_users'))
)
	<div class="form-group">
		{{ Form::label('roles', 'Roles', ['class' => 'col-sm-3 control-label']) }}

		<div class="col-sm-6">
			@foreach ($roles as $role)

				@php
					$userHasRole = false;

					if (isset($user)) {
						$assignedRoles = $user->roles->pluck('id')->toArray();
						$userHasRole = in_array($role->id, $assignedRoles);
					}
				@endphp

				<div class="checkbox">
					<label for="role-{{ $role->id }}">
						{{ form()->checkbox('role[]', $role->id, $userHasRole ?? false(), ['id' => "role-{$role->id}"]) }}
						<span>
							{{ $role->name }}
						</span>
					</label>
				</div>
			@endforeach
		</div>
	</div>
@endif