@isset($title)
	<div class="text-muted">→ {{ form()->label($slug, $title, ['class' => 'control-label']) }}</div>
@endisset

{{ old("{$slug}[]") }}

@foreach($resource as $item)
	<div class="checkbox">
		<label for="{{ $slug }}_{{ $item->getKey() }}">
			{{
				form()->checkbox(
					"{$slug}[{$item->getKey()}]",
					$item->getKey(),
					isset($model) && isset($checked) ? $model->{$checked}($item->getKey()) : null,
					[
						'id' => "{$slug}_{$item->getKey()}",
						'class' => $class ?? '',
					]
				)
			}}
			<span>
				{{ $item->{$field ?? 'name'} }}
			</span>
		</label>
	</div>

	@isset($expand)
		@php
			list($relation, $field) = explode('.', $expand);
		@endphp

		<ul class="list-unstyled pl-5">
			<li>
				@include('misc/form/one-to-many', [
					'resource' => $item->{$relation},
					'slug' => (string) $resource,
					'field' => $field,
					'expand' => null,
					'title' => null,
				])
			</li>
		</ul>
	@endisset
@endforeach