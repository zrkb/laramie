<?php

namespace Pandorga\Laramie\Http\Controllers;

use Pandorga\Laramie\Models\Role;
use Pandorga\Laramie\Models\User;
use Pandorga\Laramie\Traits\PermissionModerator;
use Illuminate\Http\Request;

class UsersController extends ResourceController
{
	use PermissionModerator;

	protected $model = \Pandorga\Laramie\Models\User::class;

	public function index()
	{
		$users = User::withTrashed()->get();

		return view('laramie::users/index', compact('users'));
	}

	public function show($id)
	{
		$user = User::withTrashed()->find($id);

		return view('laramie::users/show', compact('user'));
	}

	public function create()
	{
		$roles = Role::all();

		return view('laramie::users/create', compact('roles'));
	}

	public function store(Request $request)
	{
		$creationRules = $this->creationRules();
		$this->validate($request, $creationRules);

		// Encrypt password
		$request->merge(['password' => bcrypt($request->password)]);

		// Remove unexistent data from rules
		$data = array_intersect_key($request->all(), $creationRules);

		$user = User::create(array_merge($data, [
			'email_verified_at' => now(),
			'remember_token'    => str_random(10),
		]));

		if ($user) {
			$this->manageUser($request, $user);
			session()->flash('success', 'El registro ha sido creado exitosamente.');
		} else {
			session()->flash('error', 'Error al crear el registro. Consulte con el administrador.');
		}

		return redirect(resource('index'));
	}

	public function edit($id)
	{
		$user = User::withTrashed()->find($id);
		$roles = Role::all();

		return view('laramie::users/edit', compact('user', 'roles'));
	}

	public function update(Request $request, $id)
	{
		$user = User::withTrashed()->find($id);
		
		$updateRules = $this->updateRules($user->id);
		$this->validate($request, $updateRules);

		// Encrypt password
		if ($request->password) {
			$passwordRules = ['password' => 'sometimes|nullable|min:6'];
			$this->validate($request, $passwordRules);

			$request->merge(['password' => bcrypt($request->password)]);

			$updateRules = array_merge($updateRules, $passwordRules);
		}

		// Remove unexistent data from rules
		$data = array_intersect_key($request->all(), $updateRules);

		if ($user->update($data)) {
			$this->manageUser($request, $user);
			session()->flash('success', 'El registro ha sido modificado exitosamente.');
		} else {
			session()->flash('error', 'Error al modificar el registro. Consulte con el administrador.');
		}

		return redirect(resource('index'));
	}

	private function creationRules() : array
	{
		return [
			'first_name'    => 'required',
			'last_name'     => 'required',
			'email'         => 'required|email|unique:users,email',
			'password'      => 'required|min:6',
		];
	}

	private function updateRules($id) : array
	{
		return [
			'first_name'    => 'required',
			'last_name'     => 'required',
			'email'         => 'required|email|unique:users,email,' . $id,
		];
	}
}