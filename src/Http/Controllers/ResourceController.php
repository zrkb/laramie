<?php

namespace Pandorga\Laramie\Http\Controllers;

use Pandorga\Laramie\Exceptions\MissingModelException;
use Illuminate\Database\Eloquent\Model;

abstract class ResourceController extends BaseController
{
	protected $model;

	public function restore($id)
	{
		$instance = $this->getModel()::withTrashed()->find($id);

		if ($instance->restore()) {
			session()->flash('success', 'El registro ha sido restaurado exitosamente.');
		} else {
			session()->flash('danger', 'No se pudo restaurar el registro. Por favor comuníquese con el administrador.');
		}

		return back();
	}

	public function getModelInstance($id)
	{
		$model = $this->getModel();

		if ((new $model)->hasSoftDelete()) {
			return $model::withTrashed()->find($id);
		}

		return $model::find($id);
	}

	public function destroy($id)
	{
		$instance = $this->getModelInstance($id);
		$redirectTo = $instance->willForceDelete() ? redirect(resource('index')) : back();
		$flashMessage = $this->getSuccessDeleteMessage($instance);

		if ($this->destroyModel($instance)) {
			session()->flash('success', $flashMessage);
		} else {
			session()->flash('danger', 'No se pudo eliminar el registro. Por favor comuníquese con el administrador.');
		}

		return $redirectTo;
	}

	/**
	 * Perform delete or forceDelete acording to model status.
	 * 
	 * @return bool|null
	 */
	public function destroyModel(Model $instance)
	{
		if ($instance->hasSoftDelete() && $instance->trashed()) {

			try {
				$result = $instance->forceDelete();
			} catch (\Illuminate\Database\QueryException $exception) {
				return false;
			}

			return $result;
		}

		return $instance->delete();
	}

	public function getSuccessDeleteMessage(Model $instance) : string
	{
		return $instance->willForceDelete() ?
			'El registro se ha eliminado exitosamente de la Base de Datos' :
			'Registro inactivado exitosamente.';
	}

	/**
	 * Return resource model.
	 * 
	 * @return string
	 */
	public function getModel() : string
	{
		if (isset($this->model) == false || $this->model == null) {
			throw new MissingModelException('You must specify the $model property if extends from ResourceController.');
		}

		return $this->model;
	}
}
