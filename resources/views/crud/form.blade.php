@foreach($formFields as $field => $prop)
{{dd($prop)}}
	@if(is_array($prop))
		<?php $div = floor(12 / (count($prop) ?: 1)); ?>
		<div class="row">
			@foreach($prop as $f => $p)
				<div class="col-md-{{ $div }}">
					@include('admin::components/field', [
						'field' => $f,
						'prop' => $p,
					])
				</div>
			@endforeach
		</div>
	@else
		@include('admin::components/field', [
			'field' => $field,
			'prop' => $prop,
		])
	@endif
@endforeach

{{-- 
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="first_name">Nombre</label>
			<input type="text" class="form-control" id="first_name" name="first_name">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="last_name">Apellido</label>
			<input type="text" class="form-control" id="last_name" name="last_name">
		</div>
	</div>
</div>

<div class="form-group">
	<label for="email">Email</label>
	<input type="text" class="form-control" id="email" name="email">
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" id="password" name="password" data-eye>
</div>

<div class="form-check">
	<label for="exampleInputEmail1">Developer</label>

	<!-- Checked checkbox -->
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="is_developer">
			<span>El usuario tendrá permisos de Developer.</span>
		</label>
	</div>
</div>
--}}