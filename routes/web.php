<?php

/*
|----------------------------------------------
| Frontend - (Public)
|----------------------------------------------
*/
Route::group([
	'namespace' => 'Frontend',
], function(){
	
	Route::get('/',							'FrontendController@index')->name('frontend');
	
	Auth::routes();
});

// /*
// |----------------------------------------------
// | Frontend & User Dashboard - (Private)
// |----------------------------------------------
// */
// Route::group([
// 	'namespace' => 'Frontend',
// 	'prefix' => 'app',
// 	'middleware' => 'auth',
// ], function () {
	
// 	Route::get('/',							'AppController@index')->name('app');
	
// });

// /*
// |----------------------------------------------
// | Backend - (Private)
// |----------------------------------------------
// */
// Route::group([
// 	'namespace' => 'Backend',
// 	'prefix' => 'backend',
// 	'middleware' => 'auth',
// ], function(){
	
// 	Route::get('/',							'BackendController@index')->name('backend');
	
// });

// /*
// |----------------------------------------------
// | API - (Public)
// |----------------------------------------------
// */
// Route::group([
// 	'namespace' => 'API',
// 	'prefix' => 'api',
// 	'middleware' => 'auth',
// ], function(){
	
// 	Route::get('/',							'APIController@index')->name('api');
	
// });
