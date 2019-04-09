<?php

/*
|----------------------------------------------
| Backend - (Private)
|----------------------------------------------
*/
Admin::authRoutes();

Route::group([
	'prefix'		=> config('laramie.route.prefix'),
	'middleware'	=> config('laramie.route.middleware'),
], function () {
	
	Route::group(['namespace' => config('laramie.route.namespace')], function () {
		// App Route
		Route::get('/',                         	'AppController@index')->name('app');
	});

	Route::group(['namespace' => '\Laramie\\Admin\\Http\\Controllers'], function () {
		// Activity Log
		Route::get('activities',					'ActivitiesController@index')->name('activities.index');
		
		// Users
		Route::resource('users',					'UsersController');
		Route::post('users/{user}/restore',			'UsersController@restore')->name('users.restore');

		// RBAC - Role Based Access Control
		Route::resource('roles',					'RolesController');
		Route::resource('permissions',				'PermissionsController');
	});

});
