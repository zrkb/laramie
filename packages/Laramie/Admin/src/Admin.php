<?php

namespace Laramie\Admin;

class Admin
{
    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        // constructor body
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
            'namespace'  => 'Laramie\Admin\Http\Controllers\Auth',
            'middleware' => config('admin.route.middleware'),
        ];

        Route::group($attributes, function ($router) {

            // Route::resource('auth/users', 'UserController');
            // Route::resource('auth/roles', 'RoleController');
            // Route::resource('auth/permissions', 'PermissionController');
            // Route::resource('auth/menu', 'MenuController', ['except' => ['create']]);
            // Route::resource('auth/logs', 'LogController', ['only' => ['index', 'destroy']]);

            Route::get('auth/login', 'LoginController@login');
            Route::post('auth/login', 'LoginController@login');
            Route::get('auth/logout', 'LoginController@logout');
            // Route::get('auth/setting', 'AuthController@getSetting');
            // Route::put('auth/setting', 'AuthController@putSetting');
            
        });
    }
}
