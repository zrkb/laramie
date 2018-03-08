<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Karlomikus\Theme\Contracts\ThemeInterface;

class LoginController extends BaseController
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/app';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ThemeInterface $theme)
	{
		parent::__construct($theme);

		$this->middleware('guest')->except('logout');
	}
	
	public function showLoginForm()
	{
		return view('auth/login');
	}
	
	public function logout(Request $request)
	{
		$this->guard()->logout();
		$request->session()->invalidate();

		return redirect()->route('login');
	}
}
