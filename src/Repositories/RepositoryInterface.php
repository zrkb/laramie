<?php

namespace Laramie\Admin\Repositories;

interface RepositoryInterface
{
	public function getAll($columns = ['*']);
	public function findById($id, $columns = ['*']);
	public function save(Array $data);
	public function delete($id);
}
