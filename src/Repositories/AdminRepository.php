<?php

namespace Pandorga\Laramie\Repositories;

class AdminRepository extends BaseRepository
{
	public function model()
	{
		return \Pandorga\Laramie\Models\Admin::class;
	}
}