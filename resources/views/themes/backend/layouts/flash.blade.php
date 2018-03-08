@foreach (['danger', 'warning', 'success', 'info'] as $type)
	@if (session()->has($type))
		<div class="alert alert-{{ $type }} p-3 m-0 text-white" role="alert">
			<div class="container">
				<button type="button" class="close text-white pl-3 pr-3" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

				<p class="p-0 m-0"><strong>{{ session($type) }}</strong></p>
			</div>
		</div>
	@endif
@endforeach