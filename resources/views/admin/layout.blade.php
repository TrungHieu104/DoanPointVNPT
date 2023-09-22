<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="./favicon.ico" />

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/style.css">

	<title>Dashboard</title>
</head>

<body>


	<!-- SIDEBAR -->
    @include('admin.component.sidebar')
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



	<script src="./js/script.js"></script>
</body>

</html>