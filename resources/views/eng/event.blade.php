@extends('layouts.appeng')

@section('content')

    <header id="home" style="background-image: url({{asset('storage/events/'.$event['id'].'/main_'.$event['id'].'.jpg')}})">
        <div class="hero-shadow"></div>
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <div class="badge-pill d-flex align-items-center">
                <img class="mx-auto"  src="{{asset('storage/events/'.$event['id'].'/logo_'.$event['id'].'.svg')}}">
            </div>
            <p class="display-1">{{$event['name']}}</p>


        </div>
    </header>
    <br>
    <section>

        <div class="container">
            <h5 class=" display-3">{{$event['name']}}</h5>
            <hr>
            <h4 >{{$event['date']}}, {{$event['location']}}</h4>
            <hr>
            <div class="">
                <h3 class="text-danger">About the event</h3>
                <br>
                <p class="card-text">{{$event['opis']}}</p>
<br>
                    <a href="{{$event['homepage']}}" class="btn btn-danger ">Homepage</a>

            </div>
            <hr>
            <div class="card-body">
                <h5 class=" display-4">Streams</h5>
                @foreach($streams as $stream)
                    <a href="/media/{{$stream->id}}" class="card col-md-4 text-decoration-none">

                        <img src="{{asset('/storage/events/thumbnail.png')}}" class="card-img-top w-100" alt="...">
                        <div class="card-body">

                            <h5 class="card-title">{{$stream -> name}}</h5>

                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Data Publikacji:{{$stream -> created_at}}</small>
                        </div>

                    </a>

                @endforeach

            </div>
        </div>

    </section>



<hr>

    <h5 class=" display-3 mx-auto container">Gallery</h5>
<br>
    <section class="container gallery ">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                    <div>
                        <img src="{{asset('storage/events/'.$event['id'].'/1_'.$event['id'].'.jpg')}}" class="d-block  carousel-img" alt="...">
                    </div>
                </div>
                <div class="carousel-item" data-interval="2000">
                    <div>
                        <img src="{{asset('storage/events/'.$event['id'].'/2_'.$event['id'].'.jpg')}}" class="d-block w-100 carousel-img" alt="...">
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>



    {{--    <section id="idfirmy">--}}
    {{--        <img src="{{ URL::to('/') }}/storage/companies/{{$company['id']}}/photos/top.jpg" alt="zdjęcie firmy">--}}

    {{--        <div>--}}
    {{--            <img src="{{ URL::to('/') }}/storage/companies/{{$company['id']}}/logo.svg" alt="Logo firmy">--}}
    {{--            <h1>{{$company->name}}</h1>--}}

    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <h3 class="naglowek">O Firmie</h3>--}}
    {{--    <article id="ofirmie">--}}

    {{--        <p>{{$company->opis}}</p>--}}

    {{--    </article>--}}
    {{--    <h4 class="naglowek">Galeria zdjęć</h4>--}}
    {{--    <br>--}}
    {{--    <div id="galeriazd">--}}

    {{--        <div id="mainImage"></div>--}}
    {{--        <div id="lista">--}}
    {{--            <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/7.jpg" alt="zdjęcie" class="thumbnail">--}}
    {{--            <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/2.jpg" alt="zdjęcie" class="thumbnail">--}}
    {{--            <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/3.jpg" alt="zdjęcie" class="thumbnail">--}}
    {{--            <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/4.jpg" alt="zdjęcie" class="thumbnail">--}}
    {{--            <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/5.jpg" alt="zdjęcie" class="thumbnail">--}}
    {{--            <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/6.jpg" alt="zdjęcie" class="thumbnail">--}}
    {{--        </div>--}}



    {{--    </div>--}}












    {{--    <br><br><br><br><br>--}}

@endsection
