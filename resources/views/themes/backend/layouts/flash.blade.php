@foreach (['danger', 'warning', 'success', 'info'] as $type)
	@if (session()->has($type))
		<div class="row m-t-30">
			<div class="col-sm-12">
				<div id="panel-alert" class="panel panel-border fade in panel-{{ $type }}">
					<div class="panel-heading p-b-10">
						<h3 class="panel-title">
							{{ session($type) }}
							<button type="button" class="close m-t-5" data-target="#panel-alert" data-dismiss="alert">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        	</button>
						</h3>
					</div>
				</div>
			</div>
		</div>
	@endif
@endforeach