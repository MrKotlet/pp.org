@extends('layouts.app')

@section('content')

            <header id="home"
                    style="background-image: url({{asset('eventPhotos/'.$upcoming['id'].'/'.$upcoming->main()->name)}})">

                <div class="hero-shadow"></div>
                <a href="event/{{$upcoming['id']}}" style="text-decoration: none">
                    <div
                        class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
                        <p class="display-3 text-center">Upcoming Event</p>

                        <div class="main-logo"
                             style="background-image: url({{asset('eventPhotos/'.$upcoming['id'].'/'.$upcoming->logo()->name)}});">

                        </div>
                        <p class="display-3">{{$upcoming['name']}}</p>
                        <p>{{$upcoming->showDate()}}, {{$upcoming['location']}} </p>

                    </div>
                </a>


            </header>


    <section class=" first-section">


        <section>
            <div class="mx-auto  bg-light title">

                <p class="display-3 text-center bg-danger text-white">Streams</p>
            </div>

            <div class="card-deck d-flex container mx-auto flex-wrap justify-content-center">
                @foreach($streams as $stream)
                    <a href="media/{{$stream->id}}" class="card col-6 col-sm-4">

                        <img src="{{asset('/thumbnails/'.$stream->photo->name)}}" class="card-img-top w-100" alt="...">
                        <div class="card-body">

                            <h5 class="card-title">{{$stream -> name}}</h5>

                        </div>


                    </a>


                @endforeach

            </div>

        </section>

        <section class="">
            <div class="mx-auto  bg-light title">
                <p class="display-3 text-center bg-danger text-white m-0" >Calendar of Events</p>
                <p class="text-center bg-danger  display-4 text-white m-0" style="font-weight: bold">2021</p>
            </div>
            <div class="mx-auto calendar">
                @foreach($events as $event)
                    @if($event-> year == 2021)
                    <div class="calendar-event">
                        <div class="event-small">
                            <div class="event-logo {{$event->name}}"
                                 style="background-image: url({{asset('eventPhotos/'.$event['id'].'/'.$event->logo()->name)}});"></div>
                            <p>{{$event['name']}}</p>

                            <p>{{$event->showDate()}}</p>
                        </div>
                        <div class="event-big">
                            <p>{{$event['name']}} - {{$event->showDate()}}, {{$event['location']}}</p>
                            <hr>
                            <p >{{$event['opis']}}</p>
                            <a class="text-decoration-none text-black"
                               href="event/{{$event['id']}}">More</a>
                        </div>
                    </div>
                    @endif

                @endforeach

            </div>

            <div class="mx-auto  bg-light title">

                <p class="text-center bg-danger display-4 text-white m-0" style="font-weight: bold">2022</p>
            </div>

            <div class="mx-auto calendar">
                @foreach($events as $event)
                    @if($event-> year == 2022)
                        <div class="calendar-event">
                            <div class="event-small">
                                <div class="event-logo {{$event->name}}"
                                     style="background-image: url({{asset('eventPhotos/'.$event['id'].'/'.$event->logo()->name)}});"></div>
                                <p>{{$event['name']}}</p>

                                <p>{{$event->showDate()}}</p>
                            </div>
                            <div class="event-big">
                                <p>{{$event['name']}} - {{$event->showDate()}}, {{$event['location']}}</p>
                                <hr>
                                <p >{{$event['opis']}}</p>
                                <a class="text-decoration-none text-black"
                                   href="event/{{$event['id']}}">More</a>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>

        </section>

        <div class="jumbotron jumbo-slide bg-danger d-flex flex-column">
            <h1 class="display-4 text-light">Polish companies</h1>
            <p class="text-light checkex">If you want to find out more about Polish companies, check the "Catalogue"
                section</p>
            <hr class="my-4 white-hr">
            <br>
            <p class="text-light align-self-end">Or just click here</p>
            <a class="btn btn-light btn-lg col-6 col-sm-3 align-self-end " href="catalogue" role="button">To the
                Catalogue!</a>
        </div>


    </section>

    <br>
@endsection
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{{--    <link rel="stylesheet" href="{{asset('css/Events.css')}}">--}}
    <script src="{{asset('js/events.js')}}"></script>
@endpush
