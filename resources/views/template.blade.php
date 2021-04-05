






<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

<title>Polish Fashion - {{$title}}</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger container-fluid  ">
    <div class="container">
    <a class="navbar-brand " href="/">Polish Fashion</a>
    <button class="navbar-toggler p-10 " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active text-light">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active text-light">
                <a class="nav-link" href="/catalogue">Catalogue</a>
            </li>
            <li class="nav-item active text-light">
                <a class="nav-link" href="/events">Events</a>
            </li>
            <li class="nav-item active text-light">
                <a class="nav-link" href="/uc">Media</a>
            </li>
            <li class="nav-item active text-light">
                <a class="nav-link" href="/uc">B2B</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </div>
</nav>




@if (Auth::check())
@yield('content')
@else
    <br><br><br><br>
    <div class="jumbotron container">
        <h1 class="display-4">Przepraszamy</h1>
        <p class="lead">Nie masz uprawnień do tej strony</p>
        <hr class="my-4">

        <a class="btn btn-primary btn-lg" href="/admin/login" role="button">zaloguj się</a>
    </div>

@endif
<br><br><br>
<footer >
    <div class="container row  justify-content-around  mx-auto" >
        <a class="text-dark text-decoration-none" href="#">Regulations</a>
        <a class="text-dark text-decoration-none" href="#">Cookie Policy</a>
        <a class="text-dark text-decoration-none" href="#">Privacy</a>
        <a class="text-dark text-decoration-none" href="#">Contact</a>
    </div>

<div class="col">
    <img src="{{asset('storage/pages/LOGO_ANG.svg')}}" alt="logotypy">
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>


