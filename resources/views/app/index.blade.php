@extends('admin::layouts/app')

@section('content')
	<div class="jumbotron jumbotron-fluid">
		<h1 class="display-6 mt-4">@lang('messages.splash-title')</h1>
		<p class="lead">@lang('messages.splash-message')</p>
		<p>
			<a href="{{ route('users.index') }}">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('messages.splash-users-menu')
			</a>
		</p>
		<p>
			<a href="{{ route('roles.index') }}">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('messages.splash-rbac-menu')
			</a>
		</p>
		<p>
			<a href="javascript:;">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('messages.splash-settings-menu')
			</a>
		</p>
	</div>
@endsection