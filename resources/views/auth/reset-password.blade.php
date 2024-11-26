<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png">
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet">
	<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/sass/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}">
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
	<title>Reset Password</title>
</head>

<body>
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-4 text-center">
										<img src="assets/images/logo-icon.png" width="60" alt="Logo" />
									</div>
									<div class="text-start mb-4">
										<h5>Generate New Password</h5>
										<p class="mb-0">We received your reset password request. Please enter your new password and confirm it below.</p>
									</div>
									
									<!-- Password Reset Form -->
									<form action="{{ route('password.store') }}" method="POST">
										@csrf
										<!-- Password Reset Token -->
										<input type="hidden" name="token" value="{{ $request->route('token') }}">

										<!-- Email Address -->
										<div class="mb-3">
											<label for="email" class="form-label">Email Address</label>
											<input 
												type="email" 
												id="email" 
												name="email" 
												class="form-control" 
												placeholder="Enter your email" 
												value="{{ old('email', $request->email) }}" 
												required 
												autocomplete="username" />
											@if ($errors->has('email'))
												<div class="text-danger mt-2">{{ $errors->first('email') }}</div>
											@endif
										</div>

										<!-- New Password -->
										<div class="mb-3 mt-4">
											<label for="password" class="form-label">New Password</label>
											<input 
												type="password" 
												id="password" 
												name="password" 
												class="form-control" 
												placeholder="Enter new password" 
												required 
												autocomplete="new-password" />
											@if ($errors->has('password'))
												<div class="text-danger mt-2">{{ $errors->first('password') }}</div>
											@endif
										</div>

										<!-- Confirm Password -->
										<div class="mb-4">
											<label for="password_confirmation" class="form-label">Confirm Password</label>
											<input 
												type="password" 
												id="password_confirmation" 
												name="password_confirmation" 
												class="form-control" 
												placeholder="Confirm password" 
												required 
												autocomplete="new-password" />
											@if ($errors->has('password_confirmation'))
												<div class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</div>
											@endif
										</div>

										<!-- Submit Button -->
										<div class="d-grid gap-2">
											<button type="submit" class="btn btn-primary">Change Password</button>
											<a href="auth-basic-signin.html" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
										</div>
									</form>
									<!-- End Password Reset Form -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
