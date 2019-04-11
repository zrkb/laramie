<?php

use Illuminate\Database\Seeder;
use Laramie\Admin\Models\Permission;
use Laramie\Admin\Models\Role;
use Laramie\Admin\Models\User;

class RBACSeeder extends Seeder
{
	public function run()
	{
		// Ask for db migration refresh, default is no
		if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
			// Call the php artisan migrate:refresh
			$this->command->call('migrate:refresh');
			$this->command->warn("Data cleared, starting from blank database.");
		}

		// Seed the default permissions
		$permissions = Permission::defaultPermissions();

		foreach ($permissions as $permission) {
			Permission::firstOrCreate(['name' => $permission]);
		}

		$this->command->info('Default Permissions added.');

		// Confirm roles needed
		if ($this->command->confirm('Create Roles for user? Default is Developer and Admin [y|N]', true)) {

			// Ask for roles from input
			$input_roles = $this->command->ask('Enter roles in comma separate format.', 'Developer, Admin');

			// Explode roles
			$roles_array = explode(',', $input_roles);

			// Add roles
			foreach($roles_array as $role) {
				$role = Role::firstOrCreate(['name' => trim($role)]);

				if ( $role->name == dev_role() ) {
					// Assign all permissions
					$role->syncPermissions(Permission::all());
					$this->command->info('Developer granted all the permissions');

					// Create Developer User
					$this->createUser($role, [
						'first_name' => 'Lead',
						'last_name' => 'Developer',
						'email' => env('APP_DEVELOPER', 'developer@example.com')
					]);
				} else {
					// for others by default only read access
					$role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());

					// Create User
					$this->createUser($role);
				}
			}

			$this->command->info('Roles ' . $input_roles . ' added successfully');

		} else {
			Role::firstOrCreate(['name' => 'Admin']);
			$this->command->info('Added only default user role.');
		}

		$this->command->warn('All done :)' . PHP_EOL);
	}

	/**
	 * Create a user with given role
	 *
	 * @param $role
	 */
	private function createUser($role, $options = [])
	{
		$user = factory(User::class)->create($options);

		$user->assignRole($role->name);

		if( $role->name == dev_role() ) {
			$this->command->info('Here is your Developer details to login:');
			$this->command->warn($user->email);
			$this->command->warn('Password is "secret"');
		}
	}
}
