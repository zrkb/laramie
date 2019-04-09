<?php

return [
	'route' => [
		'prefix' => 'admin',
		'namespace' => 'App\\Http\\Controllers\\Backend',
		'middleware' => ['web', 'auth'],
	],

	'directory' => app_path('Http/Controllers/Backend'),

	'controller' => 'AppController',
];
