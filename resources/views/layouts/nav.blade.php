<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="/">
			<i data-feather="box" width="24" height="24" class="mr-2"></i>
			{{ env('APP_NAME') }}
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header-dropdown" aria-controls="navbar-header-dropdown" aria-expanded="false" aria-label="Toggle navigation">
			<i data-feather="menu"></i>
		</button>

		<div class="collapse navbar-collapse" id="navbar-header-dropdown" style="flex-grow: 0;">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('activities.index') }}" title="Notificaciones">
						<i data-feather="activity" class="feather"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a href="javascript:;"
						id="profile-dropdown"
						class="nav-link nav-link-avatar dropdown-toggle"
						data-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false">
						<div class="user-avatar">
							<span class="no-image-user" title="{{ user()->full_name }}">
								{{ user()->initials }}
							</span>
							<!-- <img src="assets/img/avatars/quaver.svg" title="{{ user()->full_name }}"> -->
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown">
						<a class="dropdown-item" href="{{ route('users.show', ['id' => user()->id]) }}">
							{{ user()->full_name }}
							<span>{{ user()->email }}</span>
						</a>

						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="{{ route('users.index') }}">
							<i data-feather="users" class="mr-2 text-muted"></i>
							@lang('messages.profile-menu-item-users')
						</a>

						<a class="dropdown-item" href="{{ route('roles.index') }}">
							<i data-feather="star" class="mr-2 text-muted"></i>
							@lang('messages.profile-menu-item-roles')
						</a>

						<a class="dropdown-item" href="{{ route('permissions.index') }}">
							<i data-feather="shield" class="mr-2 text-muted"></i>
							@lang('messages.profile-menu-item-permissions')
						</a>

						<a
							class="dropdown-item text-danger mt-2"
							href="{{ route('logout') }}"
							data-toggle="submiter"
							data-target="#logout-form">
								<i data-feather="log-out" class="mr-2"></i>
								@lang('messages.profile-menu-item-logout')
							</a>

						<form
							id="logout-form"
							action="{{ route('logout') }}"
							method="POST"
							class="d-none">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>