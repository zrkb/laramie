<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
	public function upload()
	{
		sleep(2);

		return json_encode([
			'success'=> true,
			'error'=> 'Message',
		]);
	}
}
