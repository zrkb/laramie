<?php

namespace Laramie\Admin\Repositories;

class UserRepository extends BaseRepository
{
	public function model()
	{
		return \App\Models\User::class;
	}
}