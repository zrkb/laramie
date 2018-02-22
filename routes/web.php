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

/*
|----------------------------------------------
| Backend - (Private)
|----------------------------------------------
*/
Route::group([
	'namespace' => 'Backend',
	'prefix' => 'app',
	// 'middleware' => 'auth',
], function(){
	
	Route::get('/',							'BackendController@index')->name('backend');
	Route::get('/user-interface/{slug}',	'BackendController@ui')->name('user-interface');
	Route::get('/tables/{slug}',			'BackendController@tables')->name('tables');
	
});

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
