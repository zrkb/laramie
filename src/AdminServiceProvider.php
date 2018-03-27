<?php

namespace Laramie\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class AdminServiceProvider extends ServiceProvider
{
	/**
	 * @var array
	 */
	protected $commands = [
		'Laramie\Admin\Console\Commands\InstallCommand',
	];

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{

		if (file_exists($routes = base_path() . '/routes/backend.php')) {
			$this->loadRoutesFrom($routes);
		}

		if ($this->app->runningInConsole()) {
			$this->publishes([__DIR__ . '/../config' => config_path()], 'laramie-config');
			$this->publishes([ __DIR__ . '/../database/migrations' => database_path('migrations') ], 'laramie-migrations');
			$this->publishes([ __DIR__ . '/../public' => public_path()], 'laramie-assets');
			$this->publishes([ __DIR__ . '/../resources/lang' => resource_path() . '/lang'], 'laramie-translations');

			// $this->publishes([ __DIR__ . '/Http/Controllers' => app_path('Http/Controllers')], 'laramie-controllers');
		}

		$this->commands($this->commands);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin');
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register()
	{
		if (file_exists($helper = __DIR__ . '/Helpers/admin_helper.php')) {
			require $helper;
		}
		
		// $this->mergeConfigFrom(__DIR__ . '/../config/admin.php', 'laramie-config');

		$this->registerThirdPartyVendors();
	}

	public function registerThirdPartyVendors()
	{
		$this->app->register(\Spatie\Html\HtmlServiceProvider::class);
		
		AliasLoader::getInstance(['Html' => '\Spatie\Html\Facades\Html::class']);
	}
}
