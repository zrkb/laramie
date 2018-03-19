<?php

namespace Laramie\Admin\Http\Controllers;

use App\Models\User;

class UsersController extends BaseResourceController
{
	protected $model = User::class;
	protected $title = 'Usuarios';
	protected $label = 'Usuario';
}
