<?php

namespace Pandorga\Laramie\Fields;

class HasMany extends Field
{	
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'has-many-field';

    /**
     * The class name of the related resource.
     *
     * @var string
     */
    public $resourceClass;

    /**
     * The URI key of the related resource.
     *
     * @var string
     */
    public $resourceName;

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @return void
     */
    public function __construct($name = null, $attribute = null, $resource = null)
    {
        parent::__construct($name, $attribute);

        $resource = $resource ?? $this->guessResource($name);

        $this->resourceClass = $resource;
        $this->resourceName = $resource::uriKey();
        $this->belongsToRelationship = $this->attribute;
    }

    /**
     * Guess the resource class name from the displayable name.
     *
     * @param  string  $name
     * @return string
     */
    public function guessResource($name)
    {
        $results = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 4);

        return str_replace(
            class_basename($results[3]['class']),
            Str::studly(Str::singular($name)),
            $results[3]['class']
        );
    }
}
