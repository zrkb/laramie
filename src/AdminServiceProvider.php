<?php

namespace Laramie\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Laramie\Admin\Http\Middleware\AppLocale;

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
		// Route Initiator
		if (file_exists($routes = __DIR__ . '/../routes/backend.php')) {
			$this->loadRoutesFrom($routes);
		}

		// Resources
		if ($this->app->runningInConsole()) {

			$this->publishes([
				__DIR__ . '/../config' => config_path()
			], 'laramie-config');

			$this->publishes([
				__DIR__ . '/../database/migrations' => database_path('migrations')
			], 'laramie-migrations');

			$this->publishes([
				__DIR__ . '/../public' => public_path()
			], 'laramie-assets');

			$this->publishes([
				__DIR__ . '/../resources/lang' => resource_path() . '/lang'
			], 'laramie-translations');

			// $this->publishes([
			// 	__DIR__ . '/Http/Controllers' => app_path('Http/Controllers')
			// ], 'laramie-controllers');
		}

		// Commands
		$this->commands($this->commands);

		// Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin');

        // Middlewares
        $this->app->singleton('Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode', function($app){
            return  new AppLocale($app);
        });
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
		
		$this->mergeConfigFrom(__DIR__ . '/../config/laramie.php', 'laramie');

		$this->registerThirdPartyVendors();
	}

	public function registerThirdPartyVendors()
	{
		$this->app->register(\Spatie\Html\HtmlServiceProvider::class);
		
		AliasLoader::getInstance(['Html' => '\Spatie\Html\Facades\Html::class']);
	}
}
