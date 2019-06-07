@extends('laramie::layouts/app')

@section('content')
	<div class="jumbotron jumbotron-fluid">
		<h1 class="display-6 mt-4">@lang('laramie::messages.splash-title')</h1>
		<p class="lead">@lang('laramie::messages.splash-message')</p>
		<p>
			<a href="{{ route('admins.index') }}">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('laramie::messages.splash-admins-menu')
			</a>
		</p>
		<p>
			<a href="{{ route('roles.index') }}">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('laramie::messages.splash-rbac-menu')
			</a>
		</p>
		<p>
			<a href="javascript:;">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('laramie::messages.splash-settings-menu')
			</a>
		</p>
	</div>
@endsection