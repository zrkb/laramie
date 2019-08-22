<?php

namespace Pandorga\Laramie\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Pandorga\Laramie\Http\Requests\ResourceIndexRequest;

abstract class BaseResourceController extends BaseController
{
    protected $resource;

    public function index()
    {
        $items = $this->getModel()::all();
        $resource = new $this->resource($items);

        return view($resource->viewForIndex, compact('items', 'resource'));
    }

    public function show($id)
    {
        $item = $this->getModel()::findOrFail($id);
        $resource = new $this->resource($item);

        return view($resource->viewForDetail, compact('item', 'resource'));
    }

    public function create()
    {
        $item = $this->resource::newModel();
        $resource = new $this->resource($item);

        return view($resource->viewForCreation, compact('item', 'resource'));
    }

    public function store(Request $request)
    {
        $model = $this->resource::newModel();
        $resource = new $this->resource($model);

        $this->validate($request, $resource->createRules());

        // Remove unexistent data from rules
        $data = array_intersect_key($request->all(), array_flip($model->getFillable()));

        $item = $model::create($data);

        if ($item) {
            session()->flash('success', 'El registro ha sido creado exitosamente.');
        } else {
            session()->flash('error', 'Error al crear el registro. Consulte con el administrador.');
        }

        return redirect(resource('index'));
    }

    public function edit(Request $request, $id)
    {
        $item = $this->getModel()::findOrFail($id);
        $resource = new $this->resource($item);

        return view($resource->viewForUpdate, compact('item', 'resource'));
    }

    public function update(Request $request, $id)
    {
        $model = $this->resource::newModel();
        $resource = new $this->resource($model);
        $item = $model::findOrFail($id);

        $this->validate($request, $resource->updateRules($id));

        // Remove unexistent data from rules
        $data = array_intersect_key($request->all(), array_flip($model->getFillable()));

        if ($item->update($data)) {
            session()->flash('success', 'El registro ha sido modificado exitosamente.');
        } else {
            session()->flash('error', 'Error al modificar el registro. Consulte con el administrador.');
        }

        return redirect(resource('show', $id));
    }

    public function restore($id)
    {
        $instance = $this->getModel()::withTrashed()->find($id);

        if ($instance->restore()) {
            session()->flash('info', 'El registro ha sido restaurado exitosamente.');
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
        $model = $this->resource::$model;

        return $model;
    }
}
