{{ $slot }}

<form id="delete-form-{{ $item->getKey() }}" action="{{ route(resource('destroy'), ['id' => $item->getKey()]) }}" method="POST" style="display: none;">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
</form>