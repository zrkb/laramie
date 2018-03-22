<?php

namespace Laramie\Admin\Http\Controllers\Interfaces;

trait Viewable
{
	protected $indexView = 'admin::crud/index';
	protected $showView = 'admin::crud/show';

	public function getIndexView()
	{
		return $this->indexView;
	}

	public function getShowView()
	{
		return $this->showView;
	}
}
