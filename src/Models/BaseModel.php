<?php

namespace Laramie\Admin\Models;

use Illuminate\Support\Facades\Schema;

trait BaseModel
{
	protected $keyLabel = 'id';

	public function getKeyLabel() : String
	{
		return $this->$keyLabel;
	}

	public function hasSoftDelete($field = 'deleted_at') : Bool
	{
		return Schema::hasColumn($this->getTable(), $field);
	}

	public function isActive($field = 'deleted_at') : Bool
	{
		return !! is_null($this->{$field});
	}
}
