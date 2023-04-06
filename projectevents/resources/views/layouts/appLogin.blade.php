<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard panel </title>

    <!-- Bootstrap -->
    <link href='{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}' rel="stylesheet">
	 
	  <link href='{{ asset("components/js/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}' rel="stylesheet">
	  	
    <!-- Font Awesome -->
    <link href='{{ asset("components/css/font-awesome/css/font-awesome.min.css") }}' rel="stylesheet"> 
    <!-- Custom Theme Style -->
    <link href='{{ asset("components/css/custom.min.css") }}' rel="stylesheet">
  </head>
	<body class="login">

		@yield('content')		


	</body>
</html>	