@extends('layouts.app')

@section('content')

    <header id="home"
            style="background-image: url({{asset('eventPhotos/'.$event['id'].'/'.$event->main()->name)}})">
        <div class="hero-shadow"></div>
        <div
            class="container h-100 d-flex event-header text-light text-center">
            <div class="badge-pill main-logo"
                 style="background-image: url({{asset('eventPhotos/'.$event['id'].'/'.$event->logo()->name)}});">

            </div>
            <p class="display-1">{{$event['name']}}</p>


        </div>
    </header>

    <section>

        <div class="container">
            <h5 class=" display-3">{{$event['name']}}</h5>

            <h4>{{$event->showDate()}}.{{$event->year}}, {{$event['location']}}</h4>
            <hr>
            <div class="about-event">
                <h3 class="text-danger">About the Event</h3>

                <p class="card-text">{{$event['opis']}}</p>

                <a href="{{$event['homepage']}}" class="btn btn-danger ">Homepage</a>

            </div>
            @if(!$streams->isEmpty())
                <hr>
                <h5 class=" display-4">Streams</h5>
                <div class="card-body row">

                    @foreach($streams as $stream)
                        <a href="/media/{{$stream->id}}" class="card col-6 col-md-4 text-decoration-none mx-2">

                            <img src="{{asset('/storage/events/thumbnail.png')}}" class="card-img-top w-100" alt="...">
                            <div class="card-body">

                                <h5 class="card-title">{{$stream -> name}}</h5>

                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Publish date:{{$stream -> created_at}}</small>
                            </div>

                        </a>

                    @endforeach

                </div>
            @endif
        </div>

    </section>



    <hr>

    <h5 class=" display-3 mx-auto container">Gallery</h5>
    <br>
    <section class="container gallery ">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">


                <div class="carousel-item active" data-interval="5000">
                    <div>
                        <img src="{{asset('eventPhotos/'.$event['id'].'/'.$event->main()->name)}}"
                             class="d-block  carousel-img" alt="...">
                    </div>
                </div>
                @foreach($event->others() as $other)

                    <div class="carousel-item " data-interval="5000">
                        <div>
                            <img src="{{asset('eventPhotos/'.$event['id'].'/'.$other->name)}}"
                                 class="d-block  carousel-img" alt="...">
                        </div>
                    </div>

                @endforeach

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


















@endsection
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{--<link rel="stylesheet" href="{{asset('css/event.css')}}">--}}
    <script src="{{asset('js/event.js')}}"></script>
@endpush
