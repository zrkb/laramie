<?php

namespace Pandorga\Laramie\Http\Controllers;

use Pandorga\Laramie\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends ResourceController
{
	protected $model = \Pandorga\Laramie\Models\Permission::class;

	public function index()
	{
		$permissions = Permission::all();

		return view('laramie::permissions/index', compact('permissions'));
	}

	public function show($id)
	{
		$permission = Permission::find($id);
		
		return view('laramie::permissions/show', compact('permission'));
	}

	public function create()
	{
		$actions = Permission::defaultActions();

		return view('laramie::permissions/create', compact('actions'));
	}

	public function store(Request $request)
	{
		$creationRules = $this->creationRules();
		$this->validate($request, $creationRules);

		foreach (request('actions') as $action) {
			Permission::create([
				'name' => $action . '_' . $request->name,
				'guard_name' => $request->guard_name,
			]);
		}

		session()->flash('success', 'Los Permisos han sido añadidos exitosamente.');

		return redirect(resource('index'));
	}

	public function edit($id)
	{
		$permission = Permission::find($id);

		return view('laramie::permissions/edit', compact('permission'));
	}

	public function update(Request $request, $id)
	{
		$permission = Permission::find($id);

		$updateRules = $this->updateRules($permission->id);
		$this->validate($request, $updateRules);

		// Remove unexistent data from rules
		$data = array_intersect_key($request->all(), $updateRules);

		if ($permission->update($data)) {
			session()->flash('success', 'El registro ha sido modificado exitosamente.');
		} else {
			session()->flash('error', 'Error al modificar el registro. Consulte con el administrador.');
		}

		return redirect(resource('index'));
	}

	private function creationRules() : array
	{
		return [
			'name'			=> 'required',
			'guard_name'	=> 'required',
			'actions'		=> 'required|array|min:1',
			'actions.*'		=> 'required|string|distinct',
		];
	}

	private function updateRules($id) : array
	{
		return [
			'name' => 'required',
		];
	}
}
