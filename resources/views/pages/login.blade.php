<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Laravel CRUD User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin, Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <style>
        .alert-container .alert button.close {
            margin-top: 0;
        }
    </style>
</head>

<body class="fix-menu">
    <div class="theme-loader">
        <div class="ball-scale">
            <div class="contain">
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <!-- Additional rings omitted for brevity -->
            </div>
        </div>
    </div>
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form id="loginForm" action="{{ route('login.submit') }}" method="POST"
                        class="md-float-material form-material">
                        @csrf <!-- Include CSRF token for security -->
                        <div class="text-center">
                            <h2 class="text-white"><strong>Laravel CRUD User</strong></h2>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Sign In</h3>
                                    </div>
                                </div>
                                <div class="alert-container">
                                    <!-- Alert messages will be inserted here -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required
                                        placeholder="Your Email Address">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required
                                        placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            Sign in
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/common-pages.js') }}"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
</body>

</html>
