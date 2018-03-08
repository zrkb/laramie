<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class BackendUsersSeeder extends Seeder
{
	public function run()
	{
		User::truncate();

		collect([
			['Felix', 'Ayala'],
			['Hermann', 'Schimpf'],
			['Felipe', 'Martinez'],
			['Gustavo', 'Leguizamón'],
			['Andres', 'Rosales'],
			['Juan', 'Cataldo'],
		])->each(function ($name) {
			[$firstName, $lastName] = $name;

			factory(User::class)->create([
				'first_name' => $firstName,
				'last_name' => $lastName,
				'email' => strtolower($firstName).'@agenciamoderna.com.py',
				'password' => bcrypt(strtolower($firstName)),
				'is_developer' => true,
			]);
		});
	}
}
