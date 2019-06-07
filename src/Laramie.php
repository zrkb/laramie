<?php

namespace Pandorga\Laramie;

use Closure;
use Illuminate\Support\Facades\Route;
use Pandorga\Laramie\Dashboard\Display;
use Pandorga\Laramie\Layout\Content;
use Pandorga\Laramie\Layout\Detail;
use Pandorga\Laramie\Layout\Table;

class Laramie
{
	/**
	 * @var \Pandorga\Laramie\Dashboard\Display
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
	 * Auth routes.
	 */
	public function authRoutes()
	{
		$attributes = [
			'prefix'     => config('laramie.route.prefix'),
			'namespace'  => '\Pandorga\Laramie\Http\Controllers',
			'middleware' => 'web',
		];

		Route::group($attributes, function () {
			Route::get('login', 'LoginController@showLoginForm');
			Route::post('login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout');
		});
	}
}
