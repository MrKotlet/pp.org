@extends('layouts.appeng')

@section('content')

    <header id="home" style="background-image: url(imgcss/catalogue.jpg);">
        <div class="hero-shadow"></div>
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <p class="display-sm-1 display-2" id="test">Catalogue</p>

            {{--            <a href="#aboutus" class="btn btn-outline-light">poznaj nas</a>--}}
        </div>
    </header>

    <br>
    @if($check)
        <nav class="container mx-auto my-auto filter d-none" id="filter">
            <div class="row justify-content-between align-items-center border" id="fil1">
                <p>Filtruj </p>

            </div>
    <div class="row  align-items-center border" id="fil2">
            @foreach($tags as $tag)
                @if ($tag->type == 1)
           <a href="catalogue/{{$tag->id}}">{{$tag->name}} </a>
                @endif
            @endforeach
    </div>
    <div class="row align-items-center border " id="fil3">
        @foreach($tags as $tag)
            @if ($tag->type == 2)
                <a href="catalogue/{{$tag->id}}">{{$tag->name}} </a>
            @endif
        @endforeach
        <br>

    </div>
        </nav>


    @else
        <nav class="container mx-auto" id="filter">
            <dvi class="row justify-content-between align-items-center border">
                <p>Filtruj </p>
                <a href ="/catalogue" id="fil1"><button  class="btn btn-primary">Resetuj</button></a>
            </dvi>
            <div class="row  align-items-center border">
                @foreach($tags as $tag)
                    @if ($tag->type == 1)
                        <a href="{{$tag->id}}" id="fil2">{{$tag->name}} </a>
                    @endif
                @endforeach
            </div>
            <div class="row align-items-center border">
                @foreach($tags as $tag)
                    @if ($tag->type == 2)
                        <a href="{{$tag->id}}" id="fil3">{{$tag->name}} </a>
                    @endif
                @endforeach
                <br>

            </div>
        </nav>

    @endif


<br>

<section class="container row mx-auto justify-content-center justify-content-sm-between ">
    <div class="card mb-3 row col-sm-6 col-lg-4 company "  >

        <div class="d-flex flex-column flex-fill justify-content-around parent" >

            <a href="/uc2/eng" class="text-center align-self-end mx-auto" >
                <h5 class="compname display-4 container-fluid text-align-center">Log in and show your company!</h5> </a>

            <div class="opis">


                <div class="d-flex flex-row-reverse">
                    <a href="/uc2/eng" class="btn btn-danger d-flex align-items-center text-center more">Log in!</a>

                </div>

            </div>
        </div>


    </div>
    @if($check)
    @foreach($companies as $company)
    <div class="card mb-3 row col-sm-6 col-lg-4 company "  >

            <div class="d-flex flex-column flex-fill justify-content-around parent" >
                <a href="/company/eng/{{$company['id']}}" class="mx-auto  d-flex justify-content-center align-items-center log">
                    @foreach($photos as $photo)
                        @if($company['id']==$photo['company_id'])
{{--                    <img src="public/companies/{{$company['id']}}/{{$photo['name']}}}" class="card-img w-100" alt="...">--}}
                            <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" class="card-img mx-auto catlogo" alt="...">
                        @endif
                    @endforeach

                </a>
                <a href="/company/eng/{{$company['id']}}" class="text-center align-self-end mx-auto" >
                <h5 class="compname container-fluid text-align-center">{{$company->name}}</h5> </a>
                    <p class="card-text mx-auto"><small class="text-muted">
                            @foreach($company -> tags as $tag)
                                {{$tag->name}},
                            @endforeach



                        </small></p>

                <div class="opis">


                        <div class="d-flex flex-row-reverse">
                            <a href="/company/eng/{{$company['id']}}" class="btn btn-danger d-flex align-items-center text-center more">Click for more information</a>
{{--                            <a href="#" class="btn btn-primary d-flex flex-wrap align-items-center " >Offer a meeting</a>--}}
                        </div>

                </div>
            </div>


    </div>
    @endforeach

    @else
        @foreach($companies as $company)
            @foreach($company -> tags as $tag)
                @if($tag->id == $filter)

                    <div class="card mb-3 row col-md-3 company"  >

                        <div class="d-flex flex-column flex-fill justify-content-around parent" >
                            <a href="/company/{{$company['id']}}" class="mx-auto">
                                @foreach($photos as $photo)
                                    @if($company['id']==$photo['company_id'])
                                        {{--                    <img src="public/companies/{{$company['id']}}/{{$photo['name']}}}" class="card-img w-100" alt="...">--}}
                                        <img src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" class="card-img mx-auto catlogo" alt="...">
                                    @endif
                                @endforeach

                            </a>
                            <a href="/company/{{$company['id']}}" class="text-center align-self-end mx-auto" >
                                <p class="compname display-4 container-fluid text-align-center">{{$company->name}}</p> </a>
                            <p class="card-text mx-auto"><small class="text-muted">
                                    @foreach($company -> tags as $tag)
                                        {{$tag->name}},
                                    @endforeach



                                </small></p>

                            <div class="opis">


                                <div class="d-flex flex-row-reverse">
                                    <a href="/company/{{$company['id']}}" class="btn btn-danger d-flex align-items-center more">Kliknij po więcej informacji</a>
                                    {{--                            <a href="#" class="btn btn-primary d-flex flex-wrap align-items-center " >Offer a meeting</a>--}}
                                </div>

                            </div>
                        </div>


                    </div>
                @endif
            @endforeach
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
