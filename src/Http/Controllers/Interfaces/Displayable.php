<?php

namespace Laramie\Admin\Http\Controllers\Interfaces;

trait Displayable
{
	protected $model;

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->model::all();
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
}