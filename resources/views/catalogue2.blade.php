@extends('layouts.app')

@section('content')

    <header id="home" style="background-image: url(imgcss/b2b.jpg);">
        <div class="hero-shadow"></div>
        <div
            class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <p class="display-1" id="test">B2B</p>
            <p>List of Companies taking part in networking session</p>

            {{--            <a href="#aboutus" class="btn btn-outline-light">poznaj nas</a>--}}
        </div>
    </header>







    <section class="container row mx-auto justify-content-between">
        @if($check)
            @foreach($companies as $company)
                <div class="card mb-3 row col-md-4 company">

                    <div class="d-flex flex-column flex-fill justify-content-around parent">
                        @foreach($photos as $photo)
                            @if($company['id']==$photo['company_id'])
                                <a href="company/{{$company['id']}}"
                                   class="mx-auto  d-flex justify-content-center align-items-center logo-link"
                                   style="background-image: url({{asset ('companies/'.$company['id'].'/'.$photo['name'])}});">

                                    {{--                    <img src="public/companies/{{$company['id']}}/{{$photo['name']}}}" class="card-img w-100" alt="...">--}}
                                    {{--                                    <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}"--}}
                                    {{--                                         class="card-img mx-auto catlogo" alt="...">--}}


                                </a>
                            @endif
                        @endforeach
                        <a href="/company/{{$company['id']}}" class="text-center align-self-end mx-auto">
                            <h5 class="compname container-fluid text-align-center">{{$company->name}}</h5></a>
                        <p class="card-text mx-auto"><small class="text-muted">
                                @foreach($company -> tags as $tag)
                                    {{$tag->name}},
                                @endforeach


                            </small></p>


                    </div>


                </div>
            @endforeach




        @endif
    </section>

    {{--    <section id="listafirm">--}}
    {{--        @foreach($companies as $company)--}}
    {{--            <div class="firma">--}}
    {{--                <a href="company/{{$company['id']}}"><img class="logofirmy" src="storage/companies/{{$company['id']}}/logo.svg" alt="logo firmy"></a>--}}
    {{--                <p class="category">Category: Jewellery</p>--}}
    {{--                <h3 class="nazwafirmy">{{$company->name}}</h3>--}}
    {{--                <p class="opisfirmy">{{$company->opis}}</p>--}}
    {{--                <br>--}}
    {{--                <a class="more" href="/company/{{$company['id']}}">More</a>--}}
    {{--            </div>--}}
    {{--            <br>--}}
    {{--    @endforeach--}}

@endsection
@push('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/catalogue.css')}}">

    <script src="{{ asset('js/catalogue.js') }}"></script>


@endpush
