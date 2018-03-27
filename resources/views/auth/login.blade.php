@extends('admin::layouts/master')

@section('content')
	<div class="container pt-2">
		<div class="row">
			<div class="col-12">
				<div class="card-wrapper">
					@include('admin::layouts/errors')
				</div>
			</div>

			<div class="col-12 pt-2">
				<div class="card-wrapper">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title pb-3 mb-4 border-bottom">Login</h4>

							{{ html()->form()->action(route('login'))->open() }}
							 
								<div class="form-group">
									<label for="email">E-Mail Address</label>

									<div class="input-group input-group-custom">
										<input id="email" type="email" name="email" class="form-control pull-right" placeholder="Email address" autofocus>
										<span class="input-group-custom">
											<i class="fa fa-user"></i>
										</span>
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>

									<a href="forgot.html" class="float-right hidden">
										Forgot Password?
									</a>


									<div class="input-group input-group-custom">
										<input id="password" type="password" name="password" class="form-control pull-right" placeholder="Password">
										<span class="input-group-custom">
											<i class="fa fa-lock"></i>
										</span>
									</div>
								</div>

								<div class="form-group hidden">
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">
											<span>Remember me</span>
										</label>
									</div>
								</div>

								<div class="form-group pt-3">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>

								<div class="text-center hidden">
									Don't have an account? <a href="register.html">Create One</a>
								</div>

							{{ html()->form()->close() }}
						</div>
					</div>
					
					<div class="copy text-center text-muted p-4">
						Copyright &copy; Laramie <?php echo date('Y'); ?>
					</div>
				</div>
			</div>
			{{-- END col --}}
		</div>
		{{-- END row --}}
	</div>
	{{-- END container --}}
@endsection