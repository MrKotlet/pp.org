@extends('layouts.appeng')

@section('content')

    <header id="home" style="background-image: url(

    @foreach($photos as $photo)
    @if($photo['type']=='main')
    {{--                    <img src="public/companies/{{$company['id']}}/{{$photo['name']}}}" class="card-img w-100" alt="...">--}}
        {{asset ('companies/'.$company['id'].'/'.$photo['name'])}}
    @endif
    @endforeach
);">
        <div class="hero-shadow"></div>
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <div class="badge-pill d-flex align-items-center">
                @foreach($photos as $photo)
                    @if($photo['type']=='logo')
                        {{--                    <img src="public/companies/{{$company['id']}}/{{$photo['name']}}}" class="card-img w-100" alt="...">--}}
                        <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" class="mx-auto my-auto card-img w-80 logo" alt="...">
                    @endif
                @endforeach
            </div>
            <p class="display-1">{{$company['name']}}</p>


        </div>
    </header>


{{--    <header class="white container">--}}
{{--        <div class="d-flex mx-auto justify-content-between container bg-white">--}}
{{--            <div class="company_top col-md-4  d-flex flex-column align-items-center justify-content-center">--}}
{{--                @foreach($photos as $photo)--}}
{{--                    @if($photo['type']=='logo')--}}
{{--                        --}}{{--                    <img src="public/companies/{{$company['id']}}/{{$photo['name']}}}" class="card-img w-100" alt="...">--}}
{{--                        <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" class="card-img w-80 logo" alt="...">--}}
{{--                    @endif--}}
{{--                @endforeach--}}





{{--            </div>--}}


{{--            @foreach($photos as $photo)--}}
{{--                @if($photo['type']=='main')--}}
{{--                    --}}{{--                    <img src="public/companies/{{$company['id']}}/{{$photo['name']}}}" class="card-img w-100" alt="...">--}}
{{--                    <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" class="top-img" alt="...">--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--            <div class="main-image d-flex justify-content-end">--}}

{{--            </div>--}}

{{--        </div>--}}



{{--    </header>--}}
    <section>
<br>
        <div class="container">
            <h5 class=" display-3">{{$company['name']}}</h5>
            <hr>
            <div class="">
                <h5 class=" display-4">About the Company</h5>
                <p class="card-text">{{$company['opis']}}</p>
                <br>
                <div class="d-flex flex-row-reverse">
                    <a href="https://www.{{$company['homepage']}}" class="btn btn-danger d-flex align-items-center ">Homepage</a>
                    <a href="/uc/eng" class="btn btn-primary d-flex flex-wrap align-items-center " >Offer a meeting</a>
                </div>

            </div>

            <div class=" d-none">
                <h5 class=" display-4">Streams</h5>
                <hr>
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
        <br>
        <h5 class=" display-3 mx-auto container">Gallery</h5>
        <br>
    </section>
    <section class="container-fluid gallery border">
    <div id="carouselExampleInterval" class="carousel carousel-dark slide" data-ride="carousel">
        <div class="carousel-inner">



            @foreach($photos as $photo)
                @if($photo['type']=='main')
                    <div class="carousel-item active" data-interval="5000">
                        <div class="d-flex justify-content-center align-items-center">
                                <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" class="d-block  carousel-img resposive-img" alt="...">
                        </div>
                    </div>
                @endif
                    @if($photo['type']=='other')
                        <div class="carousel-item" data-interval="5000">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" class="d-block  carousel-img" alt="...">
                            </div>
                        </div>
                    @endif
            @endforeach


{{--            <div class="carousel-item active" data-interval="10000">--}}
{{--                <div>--}}
{{--                    <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/7.jpg" class="d-block  carousel-img" alt="...">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="carousel-item" data-interval="2000">--}}
{{--                <div>--}}
{{--                <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/2.jpg" class="d-block w-100 carousel-img" alt="...">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <div>--}}
{{--                <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/3.jpg" class="d-block w-100 carousel-img" alt="...">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <div>--}}
{{--                <img src="{{URL::to('/') }}/storage/companies/{{$company['id']}}/photos/gallery/4.jpg" class="d-block w-100 carousel-img" alt="...">--}}
{{--                </div>--}}
{{--            </div>--}}
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
