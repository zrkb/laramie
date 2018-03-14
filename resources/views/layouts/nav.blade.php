<nav class="navbar navbar-expand-md navbar-dark bg-primary">
	<div class="container">
		<a class="navbar-brand" href="/">
			<i data-feather="box" width="24" height="24" class="ft ft-brand mr-2"></i> Laramie
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header-dropdown" aria-controls="navbar-header-dropdown" aria-expanded="false" aria-label="Toggle navigation">
			<i data-feather="menu"></i>
		</button>

		<div class="collapse navbar-collapse" id="navbar-header-dropdown">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="javascript:;">Reports</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:;">Help</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:;">
						<i data-feather="bell" class="ft"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link nav-link-avatar dropdown-toggle" href="javascript:;" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="user-avatar">
							<span class="no-image-user" title="{{ auth()->user()->fullname }}">
								{{ auth()->user()->initials }}
							</span>
							<!-- <img src="assets/img/avatars/quaver.svg" title="Felix Ayala"> -->
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
						<a class="dropdown-item" href="javascript:;">
							{{ auth()->user()->fullname }}
							<span>{{ auth()->user()->email }}</span>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item active" href="javascript:;">Settings</a>
						<a class="dropdown-item" href="javascript:;">Notifications</a>
						<a class="dropdown-item" href="javascript:;">PRO Trial!</a>

						<a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
						{{ Form::open(['route' => 'logout', 'id' => 'logout-form', 'class' => 'hidden']) }}
						{{ Form::close() }}
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
{{-- END navbar --}}