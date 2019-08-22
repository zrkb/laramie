<div class="form-group">
	{{ form()->label($field->attribute, $field->name, ['class' => 'control-label']) }}
	{{ form()->select($field->attribute, $field->resourceClass::$model::all()->pluck($field->resourceClass::$title, 'id'), null, ['class' => 'form-control', 'data-toggle' => 'select']) }}
</div>

<h5 class="card-title mb-4 pb-3 border-bottom">
	<i data-feather="shopping-bag" class="mr-2 text-primary"></i>
	Productos
</h5>

<div class="card mb-4 card-body">
	@include('laramie::misc/form/one-to-many', [
		'resource' => $products,
		'slug' => 'products',
		'model' => $station ?? null,
		'checked' => 'hasProduct',
	])
</div>
