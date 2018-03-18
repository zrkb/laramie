<?php

namespace Laramie\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

class BackendController extends Controller
{
	public function index()
	{
		return view('home/index');
	}

	public function ui($slug)
	{
		return view('ui/' . $slug);
	}

	public function tables($slug)
	{
		return view('tables/' . $slug);
	}

	public function extras($slug)
	{
		return view('extras/' . $slug);
	}
}
