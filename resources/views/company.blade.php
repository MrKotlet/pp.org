@extends('layouts.app')


<style>
    .logo-badge {
        background-image: url({{asset ('companies/'.$company['id'].'/'.$logo['name'])}});
        background-position: center;
        background-size: contain;
        background-origin: border-box;
        background-repeat: no-repeat;
    }

    @foreach($photos as $photo)
        @if($photo['type'] !=='logo')

            .photo{{$photo->id}}    {
        display: block;
        flex: 0 1 35vh;
        height: 35vh;
        background-image: url({{asset ('companies/'.$photo->company->id.'/'.$photo['name'])}});
        background-position: center;
        background-size: cover;
        background-origin: border-box;
        background-repeat: no-repeat;
    }




    @endif
    @endforeach

</style>
@section('content')

    <div class="mx-auto container border company-all  ">
        <div class="row">
            <div class="company-face col-12 col-lg-4 flex-column d-flex align-items-center justify-content-center">

                <div class="d-flex  align-items-center  logo-badge">

                </div>

                <h1 class="test">{{$company->name}}</h1>
            </div>
            <div class="company-info col-lg-8 col-12">
                <br>
                <h2>About the Company</h2>
                <hr>
                <p class="card-text" >{{$company->opis}}</p>
                <div class="company-buttons row justify-content-end">
                    @if(Auth::check())
                        @if($company->b2b)
                            <a href="#" class="btn btn-primary d-flex flex-wrap align-items-center open-form">Offer a
                                meeting</a>
                            <a href="#" class="btn btn-success  flex-wrap align-items-center d-none">Send a message</a>

                        @endif

                    @else
                        @if($company->b2b)
                            <a href="#" class="btn btn-outline-primary d-flex flex-wrap align-items-center"
                               data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Offer a
                                meeting</a>
                            <small class="login-info">(available for registered users)</small>
                        @endif
                        <a href="#" class="btn btn-outline-success  flex-wrap align-items-center d-none">Send a
                            message</a>

                    @endif
                    <a href="{{$company['homepage']}}" class="btn btn-danger d-flex align-items-center  ">Homepage</a>


                </div>

            </div>

        </div>
        <hr>
        <div class="gallery-all">
            <h3>Gallery</h3>
            <hr>
            <div id="gallery" data-toggle="modal"
                 data-target="#exampleModal">
                @foreach($photos as $photo)
                    @if($photo['type'] !=='logo')

                        <a href="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}"
                           data-lightbox="{{$company->name}}" class="photo{{$photo->id}} gallery-item"></a>




                    @endif
                @endforeach

            </div>
        </div>


    </div>


    <!-- meeting form-->
    <div class="container mx-auto create-meeting-div ">


        <form action="/newm/{{$company->id}}" method="POST">
            @csrf
            <div>
                <h2 class="display-3">Offer a meeting</h2>
                <p>Company {{$company->name}} is available on given dates</p>
            </div>
            <hr>
            <p>Select Date and then time.</p>
            <div id="create-dates" class="shadow-lg">

                <div class="date-container row mx-auto w-100">
                    @foreach($event->dates as $date)
                        <div
                            class="d-flex align-items-center justify-content-center col-4 form-container form-container-inactive"
                            id="{{$date->id}}">
                            <p>{{$date->date}}</p>

                        </div>
                    @endforeach


                    @foreach($event->dates as $date)
                        <div class="{{$date->id}} col-12 d-none">
                            @foreach($date->hours as $hour)

                                @if($company->hours->contains($hour->id) && !$company->meetings->contains('hour_id', $hour->id) )

                                    <div
                                        class="d-flex align-items-center justify-content-around input-container input-invisible"
                                        id="{{$hour->id}}">
                                        <p>{{$hour->hours}}</p>

                                        <i class="fas fa-dot-circle"></i>
                                        <i class="fas fa-check-circle d-none"></i>
                                        <input type="radio" name="hours" value="{{$hour->id}}" id="hours"
                                               class="d-none" required>


                                    </div>
                                @endif

                            @endforeach
                        </div>
                    @endforeach

                </div>


            </div>
            <br>
            <div class="message">
                <p class="display-4">Add a message</p>
                <small>(optional)</small>
                <textarea placeholder="add message" name="message"></textarea>

            </div>

            <br>
            <div class="summary d-none">
                <p class="display-4">Summary</p>
                <p>Data:

                    @foreach($event->dates as $date)

                        <span class="{{$date->id}}s d-none date">{{$date->date}}</span>

                    @endforeach
                    , time:
                    @foreach($company->hours as $hour)

                        <span class="{{$hour->id}}h d-none hour">{{$hour->hours}}</span>

                    @endforeach
                </p>
            </div>
            <hr>


            <div>
                <button type="submit" class="btn-lg btn-success">Offer a meeting</button>
                <button type="submit" class="btn-lg btn-danger close-form">Cancel</button>

            </div>
        </form>

    </div>

@endsection



@push('scripts')




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
    <link href="{{asset('lightbox/css/lightbox.css')}}" rel="stylesheet"/>
    <script src="{{ asset('lightbox/js/lightbox.js') }}"></script>
{{--    <link rel="stylesheet" href="{{asset('css/company.css')}}">--}}

    <script src="{{ asset('js/company.js') }}"></script>
    <script>lightbox.option({
            // 'disableScrolling': true,
            'fitImagesInViewport': true,
            'wrapAround': true,
            'positionFromTop': 25,
            'resize Duration': 400
        })</script>


@endpush
