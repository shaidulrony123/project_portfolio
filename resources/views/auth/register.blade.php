<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png">
    <!-- plugins & stylesheets -->
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/assets/sass/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <title>Register - Syndron Admin</title>
</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('assets/images/logo-icon.png') }}" width="60" alt="" />
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Syndron Admin</h5>
                                        <p class="mb-0">Please fill in the details below to create your account</p>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}" class="row g-3">
                                        @csrf
                                        <!-- Name -->
                                        <div class="col-12">
                                            <label for="inputName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- Username -->
                                        <div class="col-12">
                                            <label for="inputUsername" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="inputUsername" name="username" value="{{ old('username') }}" required autocomplete="username">
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- Email Address -->
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="inputEmailAddress" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- Password -->
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" required autocomplete="new-password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="col-12">
                                            <label for="inputPasswordConfirmation" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="inputPasswordConfirmation" name="password_confirmation" required autocomplete="new-password">
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- Terms & Conditions -->
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="terms" required>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                @error('terms')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Sign up</button>
                                            </div>
                                        </div>
                                        <!-- Sign-in Link -->
                                        <div class="col-12 text-center">
                                            <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                                        </div>
                                    </form>
                                    <!-- Social Media Login -->
                                    <div class="login-separater text-center mb-5"> <span>OR SIGN UP WITH</span>
                                        <hr />
                                    </div>
                                    <div class="list-inline contacts-social text-center">
                                        <a href="#" class="list-inline-item bg-facebook text-white border-0 rounded-3"><i class="bx bxl-facebook"></i></a>
                                        <a href="#" class="list-inline-item bg-twitter text-white border-0 rounded-3"><i class="bx bxl-twitter"></i></a>
                                        <a href="#" class="list-inline-item bg-google text-white border-0 rounded-3"><i class="bx bxl-google"></i></a>
                                        <a href="#" class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i class="bx bxl-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                const passwordInput = $('#show_hide_password input');
                const icon = $('#show_hide_password i');
                if (passwordInput.attr("type") === "text") {
                    passwordInput.attr('type', 'password');
                    icon.addClass("bx-hide").removeClass("bx-show");
                } else {
                    passwordInput.attr('type', 'text');
                    icon.addClass("bx-show").removeClass("bx-hide");
                }
            });
        });
    </script>
</body>
</html>
