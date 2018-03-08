<?php

Auth::routes();

/*
|----------------------------------------------
| Frontend - (Public)
|----------------------------------------------
*/
Route::group([
	'namespace' => 'Frontend',
], function(){
	
	Route::get('/',							'FrontendController@index')->name('frontend');

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