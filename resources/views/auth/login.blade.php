<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <title>Login - Syndron Admin</title>
</head>
<body>

<div class="container d-flex align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="assets/images/logo-icon.png" width="60" alt="Logo">
                        <h5 class="mt-3">Syndron Admin</h5>
                        <p class="text-muted">Please log in to your account</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="jhon@example.com" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                <span class="input-group-text bg-transparent border-start-0"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">Remember Me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="mb-0">Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and JavaScript Libraries -->
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#show_hide_password span").on('click', function () {
            let input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
                $(this).find("i").toggleClass("bx-hide bx-show");
            } else {
                input.attr("type", "password");
                $(this).find("i").toggleClass("bx-show bx-hide");
            }
        });
    });
</script>

</body>
</html>
