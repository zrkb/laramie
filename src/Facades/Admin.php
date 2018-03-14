<?php

namespace Laramie\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \Laramie\Admin\Admin::class;
	}
}
