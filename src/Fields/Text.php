<?php

namespace Pandorga\Laramie\Fields;

class Text extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'text-field';

    public function linkable()
    {
    	return $this->displayUsing(function ($item, $value) {
            return '<a href="' . resource('show', $item->id) . '">' . $value . "</a>";
        });
    }
}
