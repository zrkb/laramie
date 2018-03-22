<?php

namespace Laramie\Admin\Http\Controllers;

use App\Models\User;

class UsersController extends BaseResourceController
{
	protected $model = User::class;
	protected $title = 'Usuarios';
	protected $label = 'Usuario';

	protected $indexView = 'admin::users/index';
	protected $showView = 'admin::users/show';
}
