<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <title>Đánh giá Đoàn viên</title>
</head>

<body>

    @stack('script-access')
    <!-- SIDEBAR -->
    @include('user.component.sidebar')
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">

        <!-- NAVBAR -->
        @include('component.navbar')
        <!-- NAVBAR -->

        <!-- MAIN -->
        @yield('content')

        <!-- MAIN -->

    </section>
    <!-- CONTENT -->

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

    <script src="/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap/main.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script> --}}
    <script src="https://kit.fontawesome.com/5adb1ae93c.js" crossorigin="anonymous"></script>
</body>

</html>
