<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Main Page </title>

    <!-- Bootstrap -->
    <link href='{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}' rel="stylesheet">

    <link href='{{ asset("components/js/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}'
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href='{{ asset("components/css/font-awesome/css/font-awesome.min.css") }}' rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href='{{ asset("components/css/custom.min.css") }}' rel="stylesheet">
</head>
<body>
    <img src="{{asset('images/LogoIrbis.png')}}" />
    <a href="../" class="navbar-brand">ProjectEvents</a>

    <div class="navbar" id="Navbar">
        <div class="me-auto navbar-nav">
            <a class="navbar-brand" href="{{ url('/')}}" >Home</a>
            <a class="navbar-brand" href="{{ url('/events')}}">Events</a>
        </div>
        <form action="d-flex" method="GET" action="{{ url('/search')}}">
            <input placeholder="event name" type="text" name="search" class="me-sm-2 form-control">
            <button type="submit" class="btn btn-outline-success">Search</button>
        </form>

        <ul class="nav navbar-nav navbar-right" style="padding-left: 10px;">
            @if (Auth::guest())
            <li><a href="{{ url('/login')}}" class="navbar-brand">Login</a></li>
            <li><a href="{{ url ('/register')}}" class="navbar-brand">Register</a></li>
            @else
            <li><a href="{{ url('/dashboard')}}" class="navbar-brand">Admin panel</a></li>
            <div class="dropdown ms-5">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    <li><a class="dropdown-item" href="{{url('/profile/'.Auth::user()->id)}}">Profile</a></li>
                </ul>

            </div>
            @endif
        </ul>
    </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    &copy; 2023 IVKHK
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
        </div>
    
        <!-- jQuery -->
        <script src='{{ asset("components/js/dist/jquery.min.js") }}'></script>
        <!-- Bootstrap -->
        <script src='{{ asset("components/bootstrap/dist/js/bootstrap.bundle.min.js") }}'></script>
        <script src='{{ asset("components/js/bootstrap-progressbar/bootstrap-progressbar.min.js") }}'></script>
        <!-- Custom Theme Scripts -->
        <script src='{{ asset("components/js/custom.min.js") }}'></script>
</body>

</html>