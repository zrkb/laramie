<div class="form-group">
	{{ form()->label('first_name', 'Nombre', ['class' => 'control-label']) }}
	{{ form()->text('first_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form()->label('last_name', 'Apellido', ['class' => 'control-label']) }}
	{{ form()->text('last_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form()->label('email', 'Email', ['class' => 'control-label']) }}
	{{ form()->email('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form()->label('password', 'Contraseña', ['class' => 'control-label']) }}
	{{ form()->password('password', ['class' => 'form-control']) }}
</div>

@include('laramie::users/permissions')