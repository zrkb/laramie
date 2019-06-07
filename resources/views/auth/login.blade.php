@extends('laramie::layouts/master')

@section('app')

	<div class="mt-5 pt-4">
		<section class="h-100">
			<div class="container h-100">
				<div class="row">
					<div class="col-12">
						<div class="card-wrapper">
							@include('laramie::layouts/errors')
						</div>
					</div>
				</div>

				<div class="row justify-content-md-center h-100">
					<div class="card-login-wrapper">
						<div class="card card-shadow">
							<div class="card-body">
								<h5 class="card-title pb-3 mt-2 mb-4 border-bottom">
									@lang('laramie::login.welcome-title')
								</h5>

								<form action="{{ admin_base_path('login') }}" method="POST">
									@csrf

									<div class="form-group">
										<label class="control-label">@lang('laramie::login.user-label')</label>

										<input
											name="email"
											type="email"
											class="form-control"
											placeholder="@lang('laramie::login.user-placeholder')">
									</div>

									<div class="form-group">
										<label class="control-label">@lang('laramie::login.password-label')</label>
										
										<input
											name="password"
											type="password"
											class="form-control"
											placeholder="@lang('laramie::login.password-placeholder')">
									</div>

									<div class="form-group mt-5 mb-3">
										<button
											type="submit"
											class="btn btn-primary btn-block">
											@lang('laramie::login.submit-label')
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="text-center text-muted p-4">
							@lang('laramie::login.footer')
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection