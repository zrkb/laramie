<?php

namespace Laramie\Admin\Traits;

use Laramie\Admin\Exceptions\MissingFilterException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait HasCustomFilters
{
	/**
	 * @var \Illuminate\Support\Collection
	 */
	protected $filters;

	public function scopeFilterBy($query, $request = null)
	{
		$request = $request ?? request()->all();
		
		$this->filters = $this->extractFiltersFrom($request);

		$this->filters->each(function($value, $key) use (&$query) {
			$filter = str_replace('_filter', '', $key);
			$field = $this->getRelationFieldName($filter);

			if ($this->filterClassExists($filter)) {
				$this->applyFilter($filter, $query, $value);
			} else if ($this->columnExists($field)) {
				$query->where($field, $value);
			} else {
				throw new MissingFilterException(sprintf('There is no filter for "%s" key', $key));
			}
		});

		return $query;
	}

	public function applyFilter($filterName, &$query, $value)
	{
		$filterInstance = $this->resolveFilter($filterName);

		return $filterInstance->apply($query, $value);
	}

	public function resolveFilter($name)
	{
		return $this::filters()[$name];
	}

	public function getRelationFieldName($filter)
	{
		$relation = Str::snake($filter);
		$field = "{$relation}_id";

		return $field;
	}

	/**
	 * Extract all "filterable" elements from query string.
	 * 
	 * @return \Illuminate\Support\Collection
	 */
	public function extractFiltersFrom(array $request)
	{
		return collect($request)->filter(function ($input, $key) {
			return preg_match('/_filter$/', $key);
		});
	}

	/**
	 * Check wheter the model has the specified filter.
	 * 
	 * @return bool
	 */
	public function filterClassExists($key)
	{
		return isset($this::filters()[$key]);
	}

	/**
	 * Return filter list.
	 * 
	 * @return array
	 */
	public static function filters() : array
	{
		return [];
	}
}