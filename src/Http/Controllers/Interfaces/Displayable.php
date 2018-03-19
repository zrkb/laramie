<?php

namespace Laramie\Admin\Http\Controllers\Interfaces;

trait Displayable
{
	protected $model;
    protected $title = 'Blank Page';
    protected $label = 'Item';

    public function getItems()
    {
        return $this->getModel()::all();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getTitle() : String
    {
        return $this->title;
    }

    public function getLabel() : String
    {
        return $this->label;
    }
}