<?php

/*
|----------------------------------------------
| API - (Public)
|----------------------------------------------
*/
Route::group([
	'namespace' => 'API',
	'prefix' => 'api',
	// 'middleware' => 'auth',
], function(){
	
	Route::post('/upload',					'ApiController@upload')->name('upload');
	
});
