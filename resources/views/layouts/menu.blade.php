<nav class="navbar navbar-expand-md bg-white mb-5">
	<div class="container">
		@if (isset($back))
			<a class="btn btn-link pl-0" href="{{ url()->previous() }}">
				<i data-feather="chevron-left" class="mr-2 ft"></i>
				Volver
			</a>
		@endif

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu-dropdown" aria-controls="navbar-menu-dropdown" aria-expanded="false" aria-label="Toggle navigation">
			<i data-feather="menu"></i>
		</button>

		<div class="collapse navbar-collapse" id="navbar-menu-dropdown">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('backend') }}">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:;" id="lm-ui" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						User Interface
					</a>
					<div class="dropdown-menu" aria-labelledby="lm-ui">
						<a class="dropdown-item" href="{{ route('user-interface', ['slug' => 'typography']) }}">Typography</a>
						<a class="dropdown-item" href="javascript:;">Colors</a>
						<a class="dropdown-item" href="javascript:;">Close Icon</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:;" id="lm-tables" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tables
					</a>
					<div class="dropdown-menu" aria-labelledby="lm-tables">
						<a class="dropdown-item" href="{{ route('tables', ['slug' => 'basic']) }}">Basic Tables</a>
						<a class="dropdown-item" href="{{ route('tables', ['slug' => 'datatables']) }}">Datatables</a>
						<a class="dropdown-item" href="{{ route('tables', ['slug' => 'responsive']) }}">Responsive Tables</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:;" id="lm-content" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Content
					</a>
					<div class="dropdown-menu" aria-labelledby="lm-content">
						<a class="dropdown-item" href="{{ route('user-interface', ['slug' => 'typography']) }}">Typography</a>
						<a class="dropdown-item" href="javascript:;">Code</a>
						<a class="dropdown-item" href="javascript:;">Images</a>
						<a class="dropdown-item" href="javascript:;">Tables</a>
						<a class="dropdown-item" href="javascript:;">Figures</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:;" id="lm-components" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Components 1
					</a>
					<div class="dropdown-menu" aria-labelledby="lm-components">
						<a class="dropdown-item" href="javascript:;">Alerts</a>
						<a class="dropdown-item" href="javascript:;">Badges</a>
						<a class="dropdown-item" href="javascript:;">Breadcrumbs</a>
						<a class="dropdown-item" href="javascript:;">Buttons</a>
						<a class="dropdown-item" href="javascript:;">Button Group</a>
						<a class="dropdown-item" href="javascript:;">Card</a>
						<a class="dropdown-item" href="javascript:;">Carousel</a>
						<a class="dropdown-item" href="javascript:;">Collapse</a>
						<a class="dropdown-item" href="javascript:;">Dropdowns</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:;" id="lm-components" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Components 2
					</a>
					<div class="dropdown-menu" aria-labelledby="lm-components">
						<a class="dropdown-item" href="javascript:;">Forms</a>
						<a class="dropdown-item" href="javascript:;">Input Group</a>
						<a class="dropdown-item" href="javascript:;">Jumbotron</a>
						<a class="dropdown-item" href="javascript:;">List Group</a>
						<a class="dropdown-item" href="javascript:;">Modal</a>
						<a class="dropdown-item" href="javascript:;">Navs</a>
						<a class="dropdown-item" href="javascript:;">Navbar</a>
						<a class="dropdown-item" href="javascript:;">Pagination</a>
						<a class="dropdown-item" href="javascript:;">Popovers</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:;" id="lm-extras" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Extras
					</a>
					<div class="dropdown-menu" aria-labelledby="lm-extras">
						<a class="dropdown-item" href="{{ route('extras', ['slug' => 'upload']) }}">Upload File</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
{{-- END navbar --}}