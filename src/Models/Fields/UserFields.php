<?php

namespace Laramie\Admin\Models\Fields;

trait UserFields
{
	public function getIndexFields() : Array
	{
		return [
			'id' => 'ID',
			'full_name' => 'Nombre Completo',
			'email' => 'Email',
			'account_age' => 'Fecha de Creación',
		];
	}

	public function getShowFields() : Array
	{
		return [
			'full_name' => 'Nombre Completo',
			'email' => 'Email',
			'account_age' => 'Fecha de Creación',
		];
	}

	public static function getCreateFields() : Array
	{
		return [
			[
				[
					'field' => 'first_name',
					'type' => 'input',					
					'label' => 'Nombre',
					'attributes' => [
						'type' => 'text',
						'autofocus' => 'true',
					],
				],
				[
					'name' => 'last_name',
					'type' => 'input',
					'label' => 'Apellido',
					'attributes' => [
						'type' => 'text',
					],
				],
			],
			[
				'name' => 'email',
				'type' => 'input',
				'label' => 'Email',
				'attributes' => [
					'type' => 'email',
				],
			],
			[
				'name' => 'password',
				'type' => 'input',
				'label' => 'Password',
				'attributes' => [
					'type' => 'password',
				],
			],
		];
	}

	public function getEditFields() : Array
	{
		return [
			'group' => [
				'field' => [
					'name' => 'first_name',
					'type' => 'input',					
					'label' => 'Nombre',
					'attributes' => [
						'type' => 'text',
						'autofocus' => 'true',
					],
				],
				'field' => [
					'name' => 'last_name',
					'type' => 'input',
					'label' => 'Apellido',
					'attributes' => [
						'type' => 'text',
					],
				],
			],
			'field' => [
				'name' => 'email',
				'type' => 'input',
				'label' => 'Email',
				'attributes' => [
					'type' => 'email',
				],
			],
			'field' => [
				'name' => 'password',
				'type' => 'input',
				'label' => 'Password',
				'attributes' => [
					'type' => 'password',
				],
			],
		];
	}
}