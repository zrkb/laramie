<?php

namespace Laramie\Admin\Traits;

use Laramie\Admin\Models\AuthorizeAction;

trait Authorizable
{
	private $abilities = [
		'index'		=> AuthorizeAction::View,
		'show'		=> AuthorizeAction::View,

		'create'	=> AuthorizeAction::Add,
		'store'		=> AuthorizeAction::Add,

		'edit'		=> AuthorizeAction::Edit,
		'update'	=> AuthorizeAction::Edit,
		'restore'	=> AuthorizeAction::Edit,
		
		'destroy'	=> AuthorizeAction::Delete,
	];

	/**
	 * Override of callAction to perform the authorization before
	 *
	 * @param $method
	 * @param $parameters
	 * @return mixed
	 */
	public function callAction($method, $parameters)
	{
		if( $ability = $this->getAbility($method) ) {
			$this->authorize($ability);
		}

		return parent::callAction($method, $parameters);
	}

	public function getAbility($method)
	{
		$routeName = $this->getRouteName();
		$action = array_get($this->getAbilities(), $method);

		return $action ? $action . '_' . $routeName[0] : $method . '_' . $routeName[0];
	}

	private function getRouteName() : array
	{
		$routeArray = explode('.', \Request::route()->getName());

		if (count($routeArray) > 2) {
			$ability = array_pop($routeArray);
			$route = implode('.', $routeArray); 

			return [$route, $ability];
		}

		return $routeArray;
	}

	private function getAbilities()
	{
		return $this->abilities;
	}

	public function setAbilities($abilities)
	{
		$this->abilities = $abilities;
	}
}