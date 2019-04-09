<?php

namespace Laramie\Admin;

use Closure;
use Illuminate\Support\Facades\Route;
use Laramie\Admin\Dashboard\Display;
use Laramie\Admin\Layout\Content;
use Laramie\Admin\Layout\Detail;
use Laramie\Admin\Layout\Table;

class Admin
{
	/**
	 * @var \Laramie\Admin\Dashboard\Display
	 */
	protected $display;
	
	/**
	 * Create a new Skeleton Instance
	 */
	public function __construct(Display $display)
	{
		$this->display = $display;
	}

    public function content(Closure $callable = null)
    {
        return new Content($callable);
    }

    public function detail(Closure $callable = null)
    {
        return new Detail($callable);
    }

    public function table(Closure $callable = null)
    {
        return new Table($callable);
    }

	public function display()
	{
		return $this->display;
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
}
