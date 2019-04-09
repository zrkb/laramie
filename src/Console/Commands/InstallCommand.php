<?php

namespace Laramie\Admin\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

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
	public function __construct(Filesystem $files)
	{
		parent::__construct();

		$this->files = $files;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		try {
			$this->wizard();
		} catch (Exception $e) {
			$message = $e->getMessage();

			if (strpos($message, 'SQLSTATE') !== false) {
				throw new Exception("Laramie can't connect to your database. Edit your .env file and run '" . $this->signature . "' again." . PHP_EOL . $message, 1);
			} else {
				$this->error("Laramie::handle exception: " . $e);
				throw new Exception("Laramie::handle Unable to install: " . $message, 1);
			}
		}
	}

	public function wizard()
	{
		$this->info('==> Laramie installation started ...');

		$this->runMigrations();
		$this->initializeBackendDir();
	}

	public function runMigrations()
	{
		$this->warn('==> Running migrations ...');
		$this->call('migrate', ['--seed' => true]);
	}

	public function initializeBackendDir()
	{
		$this->warn('==> Initializing backend directory ...');

		$this->directory = config('laramie.directory');

		if (is_dir($this->directory)) {
			$this->line("<error>{$this->directory} directory already exists !</error> ");

			return;
		}

		$this->makeDir('/');
		$this->info('Admin directory was created: ' . str_replace(base_path(), '', $this->directory));

        // $this->createRoutesFile();
		$this->createAppController();
	}

    /**
     * Create routes file.
     *
     * @return void
     */
    protected function createRoutesFile()
    {
        $file = base_path() . '/routes/backend.php';

        $contents = $this->getStub('routes');
        $this->files->put($file, str_replace('DummyNamespace', config('laramie.route.namespace'), $contents));
        $this->info('Routes file was created: ' . str_replace(base_path(), '', $file));
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

		$this->files->put(
			$appController,
			str_replace('DummyNamespace', config('laramie.route.namespace'), $contents)
		);

		$this->info('AppController file was created: ' . str_replace(base_path(), '', $appController));
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
		return $this->files->get(__DIR__ . "/stubs/" . $name . ".stub");
	}

	/**
	 * Make new directory.
	 *
	 * @param string $path
	 */
	protected function makeDir($path = '')
	{
		$this->files->makeDirectory("{$this->directory}/$path", 0755, true, true);
	}
}
