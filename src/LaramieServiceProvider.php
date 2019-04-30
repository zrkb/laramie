<?php

namespace Pandorga\Laramie;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Pandorga\Laramie\Http\Middleware\AppLocale;

class LaramieServiceProvider extends ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			$this->publishResources();
			
			$this->commands([
				Console\Commands\InstallCommand::class,
				Console\Commands\SeedCommand::class,
				Console\Commands\ForgeController::class,
				Console\Commands\ForgeModel::class,
				Console\Commands\ForgeResource::class,
				Console\Commands\ForgeViews::class,
			]);
		}

		$this->loadResources();
		
        if (! $this->app->configurationIsCached()) {
			$this->mergeConfigFrom(__DIR__ . '/../config/laramie.php', 'laramie');
		}

        // Middlewares
        $this->registerMiddlewares();

		// Register Blade Components
		Blade::component('laramie::components/model-property', 'modelProperty');
	}

	public function registerMiddlewares()
	{
		$this->app->singleton(CheckForMaintenanceMode::class, function($app){
            return new AppLocale($app);
        });
	}

	public function publishResources()
	{
		$this->publishes([
			__DIR__ . '/../config/laramie.php' => config_path('laramie.php')
		], 'laramie-config');

		$this->publishes([
			__DIR__ . '/../public' => public_path('vendor/laramie')
		], 'laramie-assets');

		$this->publishes([
			__DIR__ . '/../database/factories' => database_path('factories')
		], 'laramie-factories');

		$this->publishes([
			__DIR__ . '/../database/migrations' => database_path('migrations')
		], 'laramie-migrations');

		$this->publishes([
			__DIR__ . '/../resources/lang' => resource_path('lang/vendor/laramie')
		], 'laramie-translations');

		$this->publishes([
			__DIR__ . '/../resources/views' => resource_path('views/vendor/laramie'),
		], 'laramie-views');

		$this->publishes([
			__DIR__ . '/../resources/fonts' => public_path('fonts'),
		], 'laramie-fonts');
	}

	public function loadResources()
	{
		// Migrations
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'laramie');

		// Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laramie');

		// Route Initiator
		$this->loadRoutesFrom(__DIR__ . '/../routes/backend.php');
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register()
	{
		// Helper File
		if (file_exists($helper = __DIR__ . '/Helpers/laramie_helper.php')) {
			require $helper;
		}

		$this->registerThirdPartyVendors();
	}

	public function registerThirdPartyVendors()
	{
		// Activity Log
		$this->app->register(\Spatie\Activitylog\ActivitylogServiceProvider::class);
		
		// Laravel Collective: HTML
		$this->app->register(\Collective\Html\HtmlServiceProvider::class);
		AliasLoader::getInstance(['Form' => \Collective\Html\FormFacade::class]);
		AliasLoader::getInstance(['Html' => \Collective\Html\HtmlFacade::class]);

		// Mediable
		$this->app->register(\Plank\Mediable\MediableServiceProvider::class);
		AliasLoader::getInstance(['MediaUploader' => \Plank\Mediable\MediaUploaderFacade::class]);
	}
}