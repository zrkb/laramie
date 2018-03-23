<?php

namespace Laramie\Admin\Http\Controllers;

use App\Models\User;
use Laramie\Admin\Http\Requests\UserRequest;

class UsersController extends BaseResourceController
{
	protected $model = User::class;
	protected $title = 'Usuarios';
	protected $label = 'Usuario';

	protected $indexView = 'admin::users/index';
	protected $showView = 'admin::users/show';

	public function create()
	{
		return view('admin::crud/create', [
			'title' => 'Añadir ' . $this->getLabel(),
			'pageTitle' => 'Añadir ' . $this->getLabel(),
			'label' => $this->getLabel(),
			'back' => true,
		]);
	}

	public function store()
	{
		dd(request());
	}
}
