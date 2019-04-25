<?php

namespace Pandorga\Laramie\Repositories;

class UserRepository extends BaseRepository
{
	public function model()
	{
		return \App\Models\User::class;
	}
}