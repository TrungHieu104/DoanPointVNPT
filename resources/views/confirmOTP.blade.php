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
    <link rel="stylesheet" type="text/css" href="./css/otp.css">
    <!--===============================================================================================-->
    <script src="/js/otp.js" defer></script>
    <style>
        .submit-resend-otp{
            border: 0;
            background: transparent;
        }
        
        #confirm-OTP{
            color: black;
            background: white;
        }
        #confirm-OTP:hover{
            background: #0e4bf1;
            color: white;
            transition: all 0.2s ease;
        }
    </style>

</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-tnvn.png'); ">
            <div class="wrap-login100 wrap-fg-pass" style="height: 570px">
                <form action="{{route('verifiedOTP_')}}" class="login100-form validate-form" method="POST" autocomplete="off" id="verificationForm">
                    @csrf
                    <span class="login100-form-logo" style="background-image: url('images/logo.png');">
                    </span>
                    <span class="login100-form-title  p-t-20 p-b-20">
                        Xác nhận OTP
                    </span>
                    <p class="text-center p-b-20">Mã OTP đã được gửi đến {{$encoded_email}}. Hãy kiểm tra Email và tiến hành xác thực. </p> 
                    <p class="time"></p>
                    <div class="input-field">
                        <input type="hidden" name="email" value="{{$email}}" />
                        <input type="number" name="otp1" />
                        <input type="number" name="otp2" disabled />
                        <input type="number" name="otp3" disabled />
                        <input type="number" name="otp4" disabled />
                        <input type="number" name="otp5" disabled />
                        <input type="number" name="otp6" disabled />
                    </div>

                    <div class="container-login100-form-btn " style="margin: 15px 0;">
                        {{-- <a href="{{url('/resend-OTP')}}">Gửi lại mã?</a> --}}
                        {{-- <button class="login100-form-btn " id="confirm-OTP" type="submit">
                            Xác thực
                        </button> --}}
                        <button id="confirm-OTP" type="submit">Xác thực</button>
                    </div>
                    
                </form>
                <form action="{{route('resendOTP')}}" method="post"> @csrf
                    <input type="hidden" name="email" value="{{$email}}" />
                    <button type="submit" style="pointer-events: all">Gửi lại mã?</button>
                </form>
                <div class="text-center rlt p-t-30" style="left:37%">
                    <a class="txt1" href="{{route('login')}}">
                        < Quay lại </a>
                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function){
            $('verificationForm').submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{route('verifiedOTP_')}}",
                    type: "POST",
                    data: formData,
                    success:function(res){
                        if(res.success){
                            alert(res.msg);
                            window.open("/","_self");
                        }else{
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('';)
                            }, 3000);
                        }
                    }
                })
            });
            
        }
    </script> --}}

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
