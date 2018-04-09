<div class="user-avatar mr-2">
	<span class="no-image-user">{{ $initials }}</span>
</div>
<a href="{{ route(resource() . '.show', [$item->getKeyName() => $item->getKey()]) }}">{{ $item->{$field} }}</a>