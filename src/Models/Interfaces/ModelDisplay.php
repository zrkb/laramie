<?php

namespace Laramie\Admin\Models\Interfaces;

interface ModelDisplay
{
	public function getIndexFields() : Array;
	public function getShowFields() : Array;
	public static function getCreateFields() : Array;
	public function getEditFields() : Array;
}
