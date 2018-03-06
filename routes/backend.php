<?php

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
	Route::get('/extras/{slug}',			'BackendController@extras')->name('extras');
	
});
