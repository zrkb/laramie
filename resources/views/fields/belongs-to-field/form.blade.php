<div class="form-group">
	{{ form()->label($field->attribute, $field->name, ['class' => 'control-label']) }}
	{{ form()->select($field->attribute, $field->resourceClass::$model::all()->pluck($field->resourceClass::$title, 'id'), null, ['class' => 'form-control', 'data-toggle' => 'select']) }}
</div>

