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

    public function getCreateFields() : Array
    {
        return [
            [
                'first_name' => [
                    'type' => 'text',
                    'autofocus' => 'true',
                ],
                'last_name' => [
                    'type' => 'text',
                ],
            ],
            'email' => [
                'type' => 'email',
            ],
            'password' => [
                'type' => 'password',
            ],
        ];
    }

    public function getEditFields() : Array
    {
        return [
            [
                'first_name' => [
                    'type' => 'text',
                    'autofocus' => 'true',
                ],
                'last_name' => [
                    'type' => 'text',
                ],
            ],
            'email' => [
                'type' => 'email',
            ],
            'password' => [
                'type' => 'password',
            ],
        ];
    }
}