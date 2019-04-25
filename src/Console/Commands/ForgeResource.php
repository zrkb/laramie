<?php

namespace Pandorga\Laramie\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ForgeResource extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'laramie:resource {name} {--i|icon=smile}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Forge a resource';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->createMigration();
		$this->createModel();
		$this->createController();
		$this->createViews();
	}

	public function createMigration()
	{
		$table = Str::plural(Str::snake(class_basename($this->argument('name'))));

		$this->call('make:migration', [
			'name' => "create_{$table}_table",
		]);
	}

	public function createModel()
	{
		$model = Str::singular(Str::studly(class_basename($this->argument('name'))));

		$this->call('laramie:model', [
			'name' => $model,
			'--force',
		]);
	}

	public function createController()
	{
		$this->call('laramie:controller', [
			'name' => $this->argument('name'),
			'--force',
		]);
	}

	public function createViews()
	{
		$this->call('laramie:views', [
			'name' => $this->argument('name'),
			'--icon' => $this->option('icon'),
			'--force',
		]);
	}

	protected function getStub($type)
	{
		return resource_path() . "stubs/resource/{$type}.stub";
	}

	protected function model($name)
	{
		$template = str_replace(
			['{{modelName}}'],
			[$name],
			$this->getStub('Model')
		);

		file_put_contents(app_path("/{$name}.php"), $modelTemplate);
	}
}
