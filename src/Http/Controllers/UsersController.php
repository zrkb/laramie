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
		$this->validate(request(), $this->rules());

		dd('foo');
	}

	public function rules()
	{
		return [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|unique:users|email|max:255',
			'password' => 'required',
		];
	}
}
