<?php

namespace Pandorga\Laramie\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;

class InstallCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'laramie:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install Laramie Admin Package';

	/**
	 * Install directory.
	 *
	 * @var string
	 */
	protected $directory = '';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Filesystem $filesystem)
	{
		parent::__construct();

		$this->filesystem = $filesystem;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->comment(PHP_EOL . 'Laramie installation started' . PHP_EOL);

		$this->line('→ Publishing vendor files ... <info>✔</info>');
		$this->callSilent('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);

		if ($this->activityLogMigrationIsMissing()) {
			$this->callSilent('vendor:publish', ['--provider' => 'Spatie\Activitylog\ActivitylogServiceProvider']);
		}

		$this->line('→ Publishing Laramie Service Provider ... <info>✔</info>');
		$this->callSilent('vendor:publish', [
			'--provider' => 'Pandorga\Laramie\LaramieServiceProvider',
			'--force',
		]);

		$this->initializeBackendDir();

		$this->info(PHP_EOL . 'Done.');
	}

	public function initializeBackendDir()
	{
		$this->line('→ Initializing Laramie directory ... <info>✔</info>');

		$this->directory = config('laramie.directory');
		$this->makeDir('/');

		$this->createAppController();
	}

	/**
	 * Create Backend Controller
	 *
	 * @return void
	 */
	public function createAppController()
	{
		$filename = config('laramie.controller');
		
		$appController = $this->directory . '/' . $filename . '.php';
		$contents = $this->getStub($filename);

		$this->filesystem->put(
			$appController,
			str_replace('DummyNamespace', config('laramie.route.namespace'), $contents)
		);
	}

	/**
	 * Get stub contents.
	 *
	 * @param $name
	 *
	 * @return string
	 */
	protected function getStub($name)
	{
		return $this->filesystem->get(__DIR__ . "/stubs/" . $name . ".stub");
	}

	/**
	 * Make new directory.
	 *
	 * @param string $path
	 */
	protected function makeDir($path = '')
	{
		$this->filesystem->makeDirectory("{$this->directory}/$path", 0755, true, true);
	}

	/**
	 * Check if activity log migration file exists.
	 *
	 * @return bool
	 */
	protected function activityLogMigrationIsMissing() : bool
	{
		$timestamp = date('Y_m_d_His');
		$folder = app()->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR;

		return Collection::make($folder)
			->flatMap(function ($path) {
				return $this->filesystem->glob($path . '*_create_activity_log_table.php');
			})
			->isEmpty();
	}
}
