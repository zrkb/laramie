<?php

namespace Pandorga\Laramie\Fields;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Pandorga\Laramie\Http\Requests\LaramieRequest;

abstract class Field extends FieldElement
{
    /**
     * The displayable name of the field.
     *
     * @var string
     */
    public $name;

    /**
     * The attribute / column name of the field.
     *
     * @var string
     */
    public $attribute;

    /**
     * The field's resolved value.
     *
     * @var mixed
     */
    public $value;

    /**
     * The validation rules for creation and updates.
     *
     * @var array
     */
    public $rules = [];

    /**
     * The validation rules for creation.
     *
     * @var array
     */
    public $creationRules = [];

    /**
     * The validation rules for updates.
     *
     * @var array
     */
    public $updateRules = [];

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @return void
     */
    public function __construct($name = null, $attribute = null)
    {
        $this->name = $name ?? class_basename(get_called_class());
        $this->attribute = $attribute ?? str_replace(' ', '_', Str::lower($name));
    }

    public function renderForIndex($item)
    {
        return view("laramie::fields/{$this->component}/index")->with([
            'field' => $this,
            'item' => $item,
            'value' => $item->getAttribute($this->attribute),
        ]);
    }

    public function renderForForm($item)
    {
        return view("laramie::fields/{$this->component}/form")->with([
            'field' => $this,
            'item' => $item,
            'value' => $item->getAttribute($this->attribute),
        ]);
    }

    public function renderForShow($item)
    {
        return view("laramie::fields/{$this->component}/show")->with([
            'field' => $this,
            'item' => $item,
            'value' => $item->getAttribute($this->attribute),
        ]);
    }
}
