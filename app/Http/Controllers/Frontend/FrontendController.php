<?php

namespace App\Http\Controllers\Frontend;

class FrontendController extends BaseController
{
	public function index()
	{
		return view('home/index');
	}
}
