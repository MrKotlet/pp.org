@extends('layouts.appeng')

@section('content')
    @foreach($events as $event)
        @if($event->visible == 1)

    <header id="home" style="background-image: url({{asset('storage/events/'.$event['id'].'/main_'.$event['id'].'.jpg')}})">

        <div class="hero-shadow"></div>
        <a href="/event/{{$event['id']}}" style="text-decoration: none">
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <p class="display-3 text-center">Upcoming event</p>
            <br>
            <div class="badge-pill d-flex align-items-center">
                <img class="mx-auto"  src="{{asset('storage/events/'.$event['id'].'/logo_'.$event['id'].'.svg')}}">
            </div>
            <p class="display-1">{{$event['name']}}</p>
            <p class="display-3"> 3-5 February 2021, Ukraine, Kyiv</p>

        </div>
        </a>


        </div>
    </header>
        @endif
    @endforeach

    <section >

        <br>


    <section >
        <div class="mx-auto  bg-light title">

            <p class="display-3 text-center bg-danger text-white">Streams</p>
        </div>

        <div class="card-deck d-flex container mx-auto flex-wrap justify-content-center">
@foreach($streams as $stream)
{{--            <a href="/media/{{$stream->id}}" class="card col-6 col-sm-4  text-decoration-none">--}}
                <a href="#" class="card col-6 col-sm-4  text-decoration-none">
                <img src="{{asset('/storage/events/thumbnail.png')}}" class="card-img-top w-100" alt="...">
                <div class="card-body">

                <h5 class="card-title">The meeting concerning the participation of Polish entrepreneurs in the International Fashion Week Dubai event</h5>
                    <small class="text-muted">Date of publication: {{$stream -> created_at}}</small>
                </div>


            </a>

@endforeach
{{--atrapy--}}
    <a href="#" class="card col-6 col-sm-4  text-decoration-none">

        <img src="{{asset('/storage/events/zamek.jpeg')}}" class="card-img-top w-100" alt="...">
        <div class="card-body">

            <h5 class="card-title">A visit to the Royal Castle in Warsaw</h5>
            <small class="text-muted">Date of publication: 2021-06-16, 12:30</small>
        </div>


    </a>


    <a href="#" class="card col-6 col-sm-4  text-decoration-none">

        <img src="{{asset('/storage/events/lpp.jpg')}}" class="card-img-top w-100" alt="...">
        <div class="card-body">

            <h5 class="card-title">Meeting with the representatives of LPP, the leader in the fashion industry in Poland, presentation by the company's representative, questions and answers</h5>
            <small class="text-muted">Date of publication: 2021-06-17, 12:30</small>
        </div>


    </a>

    <a href="#" class="card col-6 col-sm-4  text-decoration-none">

        <img src="{{asset('/storage/events/swp.gif')}}" class="card-img-top w-100" alt="...">
        <div class="card-body">

            <h5 class="card-title">Meeting with the representatives of the Polish Textile Association, presentation, questions and answers</h5>
            <small class="text-muted">Date of publication: 2021-06-18, 12:30</small>
        </div>


    </a>

        </div>
        <br>
    </section>

        <section class="">
            <div class="mx-auto  bg-light title">
            <p class="display-3 text-center bg-danger text-white">Calendar of Events</p>
            </div>
            <div class=" mx-auto">
                <table class="table ">
                    <tr>
                        <th>Event</th>

                        <th>Date</th>
                        <th>Location</th>
                        <th>More</th>
                    </tr>

                    @foreach($events as $event)
                    <tr class="event-d">
                        <td class="my-auto row"><img src="storage/events/{{$event['id']}}/logo_{{$event['id']}}.svg" class="card-img w-80 logo-cal " alt="event logo"> {{$event['name']}}</td>

                        <td class="my-auto">{{$event['date']}}</td>
                        <td class="my-auto">{{$event['location']}}</td>
                        <td class="my-auto"><a class="text-decoration-none text-black" href="/event/{{$event['id']}}">More</a></td>
                    </tr>
                    @endforeach



                </table>
            </div>



        </section>
    <br>

        <br> <br>
        <div class="jumbotron bg-danger d-flex flex-column container-fluid">
            <h1 class="display-4 text-light">Polish companies</h1>
            <p class="text-light checkex">If you want to find out more about Polish companies, check the "Catalogue" section</p>
            <hr class="my-4 white-hr">
            <br>
            <p class="text-light align-self-end">Or just click here</p>
            <a class="btn btn-light btn-lg col-6 col-sm-3 align-self-end " href="/catalogue/eng" role="button">To the Catalogue!</a>
        </div>






    </section>

    <br>
@endsection
