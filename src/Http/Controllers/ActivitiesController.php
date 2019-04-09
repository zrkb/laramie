<?php

namespace Laramie\Admin\Http\Controllers;

use Laramie\Admin\Models\Activity;

class ActivitiesController extends BaseController
{
	public function index()
	{
		$activities = Activity::latest()->get();

		return view('activities/index', compact('activities'));
	}
}
