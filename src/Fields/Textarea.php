<?php

namespace Pandorga\Laramie\Fields;

class Textarea extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'textarea-field';

    /**
     * The meta data for the element.
     *
     * @var array
     */
    public $meta = [
        'extraAttributes' => [
            'class' => 'form-control',
        ],
    ];
}
