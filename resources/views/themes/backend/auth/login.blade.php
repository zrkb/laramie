@extends('layouts/master')

@section('content')
	<div class="mt-5 pt-4">
		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						<div class="card card-shadow">
							<div class="card-body">
								<h4 class="card-title pb-3 mb-4 border-bottom">Login</h4>

								{{ Form::open(['method' => 'post', 'route' => 'login']) }}
								 
									<div class="form-group">
										<label for="email">E-Mail Address</label>

										<input id="email" type="email" class="form-control" name="email" value="" autofocus>
									</div>

									<div class="form-group">
										<label for="password">Password</label>

										<a href="forgot.html" class="float-right">
											Forgot Password?
										</a>

										<input id="password" type="password" class="form-control" name="password" data-eye>
									</div>

									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">
												<span>Remember me</span>
											</label>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block">
											Login
										</button>
									</div>

									<div class="text-center">
										Don't have an account? <a href="register.html">Create One</a>
									</div>
								{{ Form::close() }}
							</div>
						</div>
						<div class="copy text-center text-muted p-4">
							Copyright &copy; Laramie <?php echo date('Y'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection