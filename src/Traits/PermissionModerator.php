<?php

namespace Laramie\Admin\Traits;

use Laramie\Admin\Models\Permission;
use Laramie\Admin\Models\Role;
use Illuminate\Http\Request;

trait PermissionModerator
{
	/**
	 * Update Role Permissions.
	 * @param $request \Illuminate\Http\Request
	 * @param $role \App\Models\Role
	 */
	public function manageRole(Request $request, $role)
	{
		// Developer is untouchable
		$permissions = $role->name === dev_role() ? Permission::all() : $request->get('permissions', []);

		$role->syncPermissions($permissions);
	}

	/**
	 * Update User Roles.
	 * @param $request \Illuminate\Http\Request
	 * @param $user \App\Models\User
	 */
	public function manageUser(Request $request, $user)
	{
		if (is_null($request->role)) return;
		
		// Get the submitted roles
		$roles = $request->get('role', []);
		$permissions = $request->get('permissions', []);

		// Get the roles
		$roles = Role::find($roles);

		// check for current role changes
		if( ! $user->hasAllRoles( $roles ) ) {
			// reset all direct permissions for user
			$user->permissions()->sync([]);
		} else {
			// handle permissions
			$user->syncPermissions($permissions);
		}

		$user->syncRoles($roles);

		return $user;
	}
}
