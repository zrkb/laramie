<?php

return [
	'route' => [
        'prefix' => 'admin',
        'namespace' => 'App\\Http\\Controllers\\Backend',
        // 'middleware' => ['web', 'admin'],
        'middleware' => 'auth',
    ],

    'directory' => app_path('Http/Controllers/Backend'),

    'controller' => 'BackendController',
];
