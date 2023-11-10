<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quên mật khẩu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/util.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-tnvn.png'); ">
            <div class="wrap-login100 wrap-fg-pass" >
                <form action="{{ route('forgot_password.submit') }}" class="login100-form validate-form" method="POST"
                    autocomplete="off">
                    @csrf
                    <span class="login100-form-logo" style="background-image: url('images/logo.png');">
                    </span>
                    <span class="login100-form-title  p-t-20 p-b-20">
                        Quên mật khẩu?
                    </span>
                    <p class="text-center">Hãy nhập email mà bạn đã sử dụng tại hệ thống tính điểm Đoàn viên. </p>

                    <div class="wrap-input100 my-4 validate-input" data-validate="Enter Gmail">
                        <input class="input100" type="text" name="email" placeholder="Gmail" autocomplete="off">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="pb-1"></div>
                    @if (Session::exists('thongbao'))
                        <span class="error-text">{{ Session::get('thongbao') }}</span>
                    @endif

                    <div class="container-login100-form-btn ">
                        {{-- <button class="login100-form-btn" type="submit">
                        </button> --}}
                        <button type="submit" class="send_OTP">
                            Gửi mã xác thực
                        </button>
                    </div>

                    <div class="text-center rlt p-t-30" style="left:37%">
                        <a class="txt1" href="/login">
                            < Quay lại </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor/bootstrap/js/popper.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor/daterangepicker/moment.min.js"></script>
    <script src="./vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="./js/main.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        // Get the flash message from the session
        var type = '{{ Session::get('alert.type') }}';
        var msg = '{{ Session::get('alert.message') }}';
        var text = '{{ Session::get('alert.text') ?? '' }}';

        // Display the sweet alert message if it exists
        if (msg) {
            swal({
                title: msg,
                text: text,
                icon: type,
                button: "OK",
            });
        }
    </script>

</body>

</html>
