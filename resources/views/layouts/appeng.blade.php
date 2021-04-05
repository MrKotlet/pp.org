<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Polish Fashion
        @if (isset($title))
            - {{$title}}
        @endif

    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/69a4af31de.js" crossorigin="anonymous"></script>
    <script src='js/test.js' defer></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    {{--    <link rel="preconnect" href="https://fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">--}}
    {{--    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,700&display=swap" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
<div id="overlay-back"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger container-fluid  ">
    <div class="container">
        <a class="navbar-brand " href="/">Polish Fashion</a>
        <button class="navbar-toggler p-10 " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active text-light">
                    <a class="nav-link" href="/eng">Homepage <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active text-light">
                    <a class="nav-link" href="/catalogue/eng">Catalogue</a>
                </li>
                <li class="nav-item active text-light">
                    <a class="nav-link" href="/events/eng">Events</a>
                </li>
                <li class="nav-item active text-light d-none">
                    <a class="nav-link" href="/media">Media</a>
                </li>
                <li class="nav-item active text-light">
                    <a class="nav-link" href="/uc/eng">B2B</a>
                </li>



                @if (Auth::check())

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/home">User panel</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class=>
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login/Register
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/login">login</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/register">register</a>
                        </div>
                    </li>
                @endif


            </ul>
            <form class="form-inline my-2 my-lg-0 d-none">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>

            <a href="/" class="nav-link"><button class="btn btn-light">Wersja Polska</button></a>

        </div>
    </div>

</nav>

<div id="app ">


    <main >
        @yield('content')
    </main>
</div>
@yield('modal')
<br><br><br>
<footer  >
    <div class="container row  justify-content-around  mx-auto" >
        <a class="text-dark text-decoration-none" href="#">Regulations</a>
        <a class="text-dark text-decoration-none" href="#">Cookie Policy</a>
        <a class="text-dark text-decoration-none" href="#">Privacy</a>
        <a class="text-dark text-decoration-none" href="#">Contact</a>
    </div>
    <br><br>
    @if(Auth::check())
        <div class="container">
            <img src="{{asset('storage/pages/LOGO_ANG.svg')}}" alt="logotypy">
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</footer>
</body>
</html>

