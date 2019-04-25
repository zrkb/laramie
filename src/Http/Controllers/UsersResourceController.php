<?php

namespace Pandorga\Laramie\Http\Controllers;

use App\Models\User;
use Pandorga\Laramie\Http\Requests\UserRequest;
use Pandorga\Laramie\Repositories\UserRepository;
use Pandorga\Laramie\Facades\Admin;
use Pandorga\Laramie\Layout\Content;
use Pandorga\Laramie\Layout\Table;
use Pandorga\Laramie\Layout\Detail;

class UsersResourceController extends BaseResourceController
{
	protected $label = 'Usuarios';

	protected $indexView = 'laramie::users/index';
	protected $showView = 'laramie::users/show';

	public function repository()
	{
		return UserRepository::class;
	}

	public function list($items)
	{
		return Admin::table(function (Table $table) use ($items) {
			$table->rows($items);

			$table->column('id', 'ID');
			$table->column('full_name', 'Nombre Completo')->linkable();
			$table->column('account_age', 'Creado');
			$table->column('last_modified', 'Modificado');
		});
	}

	public function detail($item)
	{
		return Admin::detail(function (Detail $detail) use ($item) {
			$detail->title('Detalle de Usuario');
			$detail->item($item);

			$detail->field('full_name', 'Nombre Completo');
			$detail->field('email', 'Email');
			$detail->field('account_age', 'Creado');
		});
	}

	public function form()
	{
		return Admin::form(function (Form $form) {
			$form->input('');
		});
	}

	public function create()
	{
		return view('laramie::crud/create', [
			'title' => 'Añadir ' . $this->getLabel(),
			'pageTitle' => 'Añadir ' . $this->getLabel(),
			'label' => $this->getLabel(),
			'back' => true,
		]);
	}

	public function store()
	{
		$this->validate(request(), $this->rules());
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
