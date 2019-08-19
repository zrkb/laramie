<?php

namespace Pandorga\Laramie;

use Illuminate\Support\Facades\Route;

class Laramie
{
	/**
	 * Auth routes.
	 */
	public function authRoutes()
	{
		$attributes = [
			'prefix'     => config('laramie.route.prefix'),
			'namespace'  => '\Pandorga\Laramie\Http\Controllers\Auth',
			'middleware' => 'web',
		];

		Route::group($attributes, function () {
			Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
			Route::post('register', 'RegisterController@register');
			Route::get('login', 'LoginController@showLoginForm')->name('login');
			Route::post('login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout');
		});
	}

	public function resource($resource, $controller)
	{
		$attributes = [
			'namespace'  => config('laramie.route.namespace'),
			'middleware' => config('laramie.route.middleware'),
		];

		Route::group($attributes, function () use ($resource, $controller) {
			Route::resource($resource, $controller);
			Route::post("{$resource}/{id}/restore", "{$controller}@restore")
				 ->name("{$resource}.restore");
		});
	}
}
