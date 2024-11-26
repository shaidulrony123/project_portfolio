<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png">
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <title>Kalangtor24 - Forgot Password</title>
</head>
<body>
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card forgot-box">
            <div class="card-body">
                <div class="p-3 text-center">
                    <img src="{{ asset('backend/assets/images/icons/forgot-2.png') }}" width="100" alt="Forgot Password" />
                    <h4 class="mt-4 font-weight-bold">Forgot Password?</h4>
                    <p class="text-muted">Enter your registered email ID to reset the password.</p>
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="my-4">
                            <label for="email" class="form-label">Email ID</label>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Email ID" value="{{ old('email') }}" autofocus required>
                            @if ($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Email Password Reset Link
                            </button>
                            <a href="auth-basic-signin.html" class="btn btn-light">
                                <i class='bx bx-arrow-back me-1'></i>Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
