<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-family: 'Optimistic Text', Helvetica, sans-serif;
        }

        .tdcss {
            padding: 26px 32px 0px 32px;
            word-break: break-word;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-start {
            text-align: start;
        }

        .text-end {
            text-align: end;
        }

        .text-danger {
            color: red;
        }

        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }

        .text-success {
            --bs-text-opacity: 1;
            color: rgba(25, 135, 84);
        }

        .tbd,
        .th,
        .tf tr:last-child {
            border-bottom: 1px dashed #000 !important;
        }
        .text {
            font-size: 16px;
            letter-spacing: none;
            line-height: 1.8;
            text-align: left;
            color: #414141
        }

        .m-0 {
            margin: 0 0 !important;
        }
        .OTP{
            font-weight: bold;
            letter-spacing: 1lvh;
            margin: 1.5em 0 0 0;
        }
        .ta-justify{
            text-align:justify;
        }
    </style>
</head>

<body>
    <div align="center" style="background-color:#f5f5f5;width:100%">
        <div class="py-5" style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:550px">
            <table align="center" style="background-color:#ffffff;width:100%">
                <tr>
                    <td style="padding:20px 32px 0px 32px;">
                        <div style="margin:0 auto">
                            <a href="" target="_blank" data-saferedirecturl="">
                                <img height="auto" width="100" src="https://1.bp.blogspot.com/-jXlJL_fkv_4/VaDF3ZfLIXI/AAAAAAAABgQ/iT2wTpSkzJw/s1600/logo-doan-thanh-nien-cong-san-viet-nam.png"
                                    style="border:none;outline:none;text-decoration:none;height:auto;width:10%;font-size:13px;display:block">
                            </a>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="tdcss">
                        <div class="text">

                            <!-- {{-- <p class="m-0">Chào {{ $lastName }},</p> --}} -->
                            <p class="m-0">Chào Hiếu,</p>
                            <p class="m-0">&nbsp;</p>
                            <p class="m-0 ta-justify">Hệ thống Đoàn Thanh Niên Cộng Sản Việt Nam nhận được yêu cầu cập nhật lại mật khẩu. Đây là mã OTP xác nhận của bạn
                            </p>
                            <p class="OTP text-center">{{$otp}}</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tdcss">
                        <div class="text">
                            <p class="m-0 ta-justify">
                                Hãy chắc chắn rằng bạn là người gửi yêu cầu xác nhận cập nhật lại mật khẩu. Vui lòng không cung cấp mã OTP này cho bất kì đơn vị, tổ chức nào để tránh bị lợi dụng cho mục đích xấu.
                            </p>
                        </div>
                        <p class="m-0">&nbsp;</p>
                        <div class="text">
                            <p class="m-0"> Trân trọng,</p>
                            <p class="m-0">
                                <i>
                                    Đội ngũ Đoàn Thanh Niên Việt Nam
                                </i>
                            </p>
                        </div>
                    </td>

                </tr>
            </table>
        </div>
    </div>
</body>

</html>