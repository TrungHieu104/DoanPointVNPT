<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
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
            <div class="wrap-login100">
                <form action="{{ route('login.submit') }}" class="login100-form validate-form" method="POST"
                    autocomplete="off"> 
                    @csrf
                    <span class="login100-form-logo" style="background-image: url('images/logo.png');">

                    </span>


                    <span class="login100-form-title  p-t-20 p-b-20">
                        Đăng nhập
                    </span>
                    {{-- <div class="text-center p-b-20">
                        <p class="txt1">
                            Chưa có tài khoản?
                            <a class="txt1 txt1-color" href="#">
                                Đăng kí ngay
                            </a>
                        </p>
                    </div> --}}
                    
                    <div class="wrap-input100  validate-input" data-validate="Enter Gmail">
                        <input class="input100" type="text" name="email" placeholder="Gmail" autocomplete="off">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <!-- <span class="error-text">Error</span> -->
                    <div class="pb-1"></div>

                    <div class="wrap-input100 mt20  validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <!-- <span class="error-text">Error</span> -->
                    @if (Session::exists('thongbao'))
                    <span class="error-text">{{ Session::get('thongbao') }}</span> 
                @endif

                    <div class="contact100-form-checkbox m-t-10">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <label class="label-checkbox100" for="ckb1">
                            Ghi nhớ đăng nhập
                        </label>
                    </div>
                    

                    <div class="container-login100-form-btn ">
                        <button class="login100-form-btn" type="submit">
                            Đăng nhập
                        </button>
                    </div>

                    <div class="text-center rlt p-t-30">
                        <a class="txt1" href="#">
                            Quên mật khẩu?
                        </a>
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

</body>

</html>
