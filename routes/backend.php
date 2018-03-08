<?php



/*
|----------------------------------------------
| Backend - (Private)
|----------------------------------------------
*/
Route::group([
	'namespace' => 'Backend',
	'prefix' => 'app',
	'middleware' => 'auth',
], function(){

    // Route::post('login', 'LoginController@login');
    // Route::post('logout', 'LoginController@logout')->name('back.logout');

    // Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    // Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    // Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');
    // Route::post('password/reset', 'ResetPasswordController@reset');
	
	Route::get('/',							'BackendController@index')->name('backend');
	Route::get('/user-interface/{slug}',	'BackendController@ui')->name('user-interface');
	Route::get('/tables/{slug}',			'BackendController@tables')->name('tables');
	Route::get('/extras/{slug}',			'BackendController@extras')->name('extras');
	
});
