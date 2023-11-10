<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./favicon.ico" />
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <div class="wrap-login100 w-50">
                <form action="{{ route('register.submit') }}" class="login100-form validate-form" method="POST" autocomplete="off">
                    @csrf
                    <div class="login100-form-logo" style="background-image: url('images/logo.png');"></div>

                    <span class="login100-form-title p-t-20 p-b-20">
                        Đăng ký
                    </span>
                    <div class="row gx-5">
                        <div class="col">
                            <div class="p-2">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" value="{{old('name')}}" name="name" placeholder="Họ & Tên" autocomplete="off">
                                    <span class="focus-input100" ></span>
                                </div>
                                <span class="error-text">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-2">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="number" value="{{old('phone')}}" name="phone" placeholder="Số điện thoại">
                                    <span class="focus-input100"></span>
                                </div>
                                <span class="error-text">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col">
                            <div class="p-2">
                                <div class="wrap-input100 validate-input" data-validate="Enter Gmail">
                                    <input class="input100" type="email" value="{{old('email')}}" name="email" placeholder="Gmail" autocomplete="off">
                                    <span class="focus-input100" ></span>
                                </div>
                                <span class="error-text">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-2">
                                <div class="wrap-input100 validate-input" data-validate="Enter password">
                                    <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                                    <span class="focus-input100"></span>
                                </div>
                                <span class="error-text">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col">
                            <div class="p-2">
                                <select class="form-select" name="id_CQ" aria-label="Default select example">
                                    <option selected>Chọn cơ quan Đoàn</option>
                                    @foreach ($coquan as $cq)
                                        <option value="{{$cq->id_CQ}}">{{$cq->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-2">
                                <div class="wrap-input100 validate-input" data-validate="Enter password">
                                    <input class="input100" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                                    <span class="focus-input100"></span>
                                </div>
                                <span class="error-text">
                                    @error('repassword')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="container-login100-form-btn my-3 w-50 mx-auto">
                        <button type="submit" class="send_OTP">
                            Đăng ký
                        </button>
                    </div>

                    <center>
                        <a class="txt1 text-decoration-none " href="{{ url('login') }}">
                            Đăng nhập
                        </a>
                    </center>
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
