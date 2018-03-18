<?php

namespace Laramie\Admin;

use Illuminate\Support\Facades\Route;

class Admin
{
	/**
	 * Create a new Skeleton Instance
	 */
	public function __construct()
	{
		// constructor body
	}

	/**
	 * Friendly welcome
	 *
	 * @param string $phrase Phrase to return
	 *
	 * @return string Returns the phrase passed in
	 */
	public function authRoutes()
	{
		$attributes = [
			'prefix'     => config('admin.route.prefix'),
			'namespace'  => '\Laramie\Admin\Http\Controllers',
			'middleware' => 'web',
		];

		Route::group($attributes, function () {
			Route::get('login', 'LoginController@showLoginForm')->name('login');
			Route::post('login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout')->name('logout');

			Route::group(['middleware' => 'auth'], function() {
				// Resources
				Route::resource('/users', 'UsersController');
			});

			// // Registration Routes...
			// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
			// $this->post('register', 'Auth\RegisterController@register');

			// // Password Reset Routes...
			// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
			// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
			// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
			// $this->post('password/reset', 'Auth\ResetPasswordController@reset');
		});
	}

	public static function foo()
	{
		return 'foo';
	}
}
