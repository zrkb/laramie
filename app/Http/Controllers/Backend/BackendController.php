<?php

namespace App\Http\Controllers\Backend;

class BackendController extends BaseController
{
	public function index()
	{
		return view('home/index');
	}

	public function custom($view)
	{
		return view('bootstrap/' . $view);
	}
}
