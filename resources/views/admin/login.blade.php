<!DOCTYPE html>
<html>

<head>
    <title>Endgear - Admin Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css ') }}">
    <!--===============================================================================================-->
</head>

<body>
        <div class="limiter">
            <div class="container-login100"
                style="background-image: url('{{ asset('assets/images/wallpaper.jpg') }}');">
                <div class="wrap-login100 p-t-30 p-b-50">
                    <span class="login100-form-title p-b-41">
                        Admin
                    </span>
                    <div class="">
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                            @endif
                        </div>
                        <form class="login100-form validate-form p-b-33 p-t-5" action="/admin/login" method="POST">
                            @csrf
                            <div class="wrap-input100 ">

                                <input class="input100" type="text" name="email" placeholder="Nhập địa chỉ email">


                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Enter password">

                                <input class="input100" id="password" type="password" name="password"
                                    placeholder="Nhập mật khẩu" autofocus>
                                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                            </div>

                            <div class="container-login100-form-btn m-t-32">
                                <button type="submit" class="login100-form-btn">
                                    Đăng nhập
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



                    <!--===============================================================================================-->
                    <script src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
                    <!--===============================================================================================-->
                    <script src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
                    <!--===============================================================================================-->
                    <script src="{{ asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
                    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
                    <!--===============================================================================================-->
                    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
                    <!--===============================================================================================-->
                    <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
                    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}/"></script>
                    <!--===============================================================================================-->
                    <script src="{{ asset('assets/vendor/countdowntime/countdowntime.js') }}"></script>
                    <!--===============================================================================================-->
                    <script src="{{ asset('assets/js/mainadmin.js') }}"></script>
</body>

</html>
