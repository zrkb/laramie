@component('admin::crud/show', [
	'title' => 'Usuarios',
	'back' => true,
	'item' => $item,
])

	@slot('stats')
		@include('admin::users.stats')
	@endslot

	@slot('icon')
		<a class="page-icon">
			<span title="{{ $item->fullName }}">{{ $item->initials }}</span>
		</a>
	@endslot

	@slot('pageTitle')
		<span class="text-primary">#{{ $item->getKey() }}</span>
		<span class="text-muted">&rarr;</span>
		{{ $item->fullName }}
	@endslot

@endcomponent