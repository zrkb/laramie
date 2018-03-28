<?php

namespace Laramie\Admin\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class BaseRepository implements RepositoryInterface
{
	/**
	 * @var app
	 */
	private $app;

	/**
	 * @var model
	 */
	private $model;

	/**
	 * Specify Model class name
	 *
	 * @return class
	 */
	abstract public function model();

	public function __construct(App $app)
	{
		$this->app = $app;
		$this->makeModel();
	}

	public function makeModel()
	{
		$model = $this->app->make($this->model());
 
		if (!$model instanceof Model) {
			throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
		}
 
		return $this->model = $model;
	}

	public function getAll($columns = ['*'])
	{
		return $this->model->get($columns);
	}

	public function findById($id, $columns = ['*'])
	{
        return $this->model->findOrFail($id, $columns);
    }

	public function save(Array $data)
	{
		return $this->model->save($data);
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}
}