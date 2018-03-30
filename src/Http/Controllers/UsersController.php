<?php

namespace Laramie\Admin\Http\Controllers;

use App\Models\User;
use Laramie\Admin\Http\Requests\UserRequest;
use Laramie\Admin\Repositories\UserRepository;
use Laramie\Admin\Facades\Admin;
use Laramie\Admin\Layout\Content;

class UsersController extends BaseResourceController
{
	protected $title = 'Usuarios';
	protected $label = 'Usuario';

	protected $indexView = 'admin::users/index';
	protected $showView = 'admin::users/show';

	public function repository()
	{
		return UserRepository::class;
	}

	public function create()
	{
        return Admin::content(function (Content $content) {
            $content->header('Añadir Usuarios');
            $content->description('Muh Description');
            $content->body('show create form');
        });

		dd(User::getCreateFields());
		return view('admin::crud/create', [
			'title' => 'Añadir ' . $this->getLabel(),
			'pageTitle' => 'Añadir ' . $this->getLabel(),
			'label' => $this->getLabel(),
			'back' => true,
			'formFields' => User::getCreateFields(),
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
