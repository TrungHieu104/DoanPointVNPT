{{-- @if (Auth::check()) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đổi mật khẩu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-tnvn.png'); ">
            <div class="wrap-login100" @if(session()->has('email')) style="height: 540px" @endif>
                <form action="{{ route('changePassword.submit') }}" class="login100-form validate-form" method="POST"
                    autocomplete="off">
                    @csrf
                    <span class="login100-form-logo" style="background-image: url('images/logo.png');"></span>
                    <span class="login100-form-title  p-t-20 p-b-20">
                        Đổi mật khẩu
                    </span>
                    @if(!session()->has('email'))
                        
                        <div class="wrap-input100  validate-input" data-validate="Enter Gmail">
                            <input class="input100" type="password" name="password" placeholder="Mật khẩu hiện tại"
                                autocomplete="off">
                            <span class="focus-input100"></span>
                        </div>
                        
                        @if (Session::exists('error_old_pass'))
                            <span class="error-text">
                                {{ session('error_old_pass')['message'] }}
                            </span>
                        @endif
                    @endif

                    <div class="wrap-input100 mt10  validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="newpassword" placeholder="Mật khẩu mới">
                        <span class="focus-input100"></span>
                    </div>
                    <span class="error-text">
                        @error('newpassword')
                            {{ $message }}
                        @enderror
                    </span>


                    <div class="wrap-input100 mt10  validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="re_newpassword"
                            placeholder="Nhập lại mật khẩu mới">
                        <span class="focus-input100"></span>
                    </div>
                    <span class="error-text">
                        @error('re_newpassword')
                            {{ $message }}
                        @enderror
                    </span>

                    <div style="position: absolute; left:34%; bottom:3%">

                        <div class="container-login100-form-btn m-t-15 mt-5">
                            <button class="login100-form-btn" type="submit">
                                Đổi mật khẩu
                            </button>
                        </div>
                        <div class="container-login100-form-btn m-t-10">
                            @if (Auth::check())

                                @if (auth()->user()->role == 1)
                                    <a href="{{ route('admin.dashboard') }}">
                                        Quay lại
                                    </a>
                                @else
                                    <a href="{{ route('profile.index') }}">
                                        Quay lại
                                    </a>
                                @endif
                            @else
                                <a href="/login">
                                    Quay lại
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/bootstrap/js/popper.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/daterangepicker/moment.min.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/js/main.js"></script>

</body>

</html>
{{-- @endif --}}

{{-- 
@push('script-access')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        // Get the flash message from the session
        var type = '{{ Session::get('alert.type') }}';
        var msg = '{{ Session::get('alert.message') }}';

        // Display the sweet alert message if it exists
        if (msg) {
            swal({
                title: msg,
                // text: msg,
                icon: type,
                button: "OK",
            });
        }
    </script>
@endpush --}}
