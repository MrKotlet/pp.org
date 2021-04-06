@extends('layouts.app')
<style>
    @foreach($photos as $photo)
    .{{$photo->company->name}} {
        background-image: url({{asset ('companies/'.$photo->company->id.'/'.$photo['name'])}})

    }
    @endforeach
</style>
@section('content')

    <header id="home" style="background-image: url(imgcss/catalogue.jpg)">
        <div class="hero-shadow"></div>
        <div
            class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <p class="display-sm-1 display-2">Catalogue</p>

            {{--            <a href="#aboutus" class="btn btn-outline-light">poznaj nas</a>--}}
        </div>
    </header>



    <nav class="container mx-auto filter" id="filter">
        <div class="border" id="fil1">
            <p>Filter by tags <i class="fas fa-sort-down"></i></p>
            <a class="reset">Reset</a>
        </div>
        <div  id="fil2">
            @foreach($tags as $tag)

                <a class="filter-tag" id="{{Str::kebab($tag->name)}}">{{ Str::ucfirst($tag->name)}}<i
                        class="fas fa-check-circle"></i> </a>

            @endforeach
        </div>

    </nav>






    <br>

    <section class="container row mx-auto justify-content-center justify-content-sm-between ">

        @foreach($companies as $company)
            <div
                class="card mb-3 row col-sm-6 col-lg-4 company @foreach($company -> tags as $tag) {{ Str::kebab($tag->name)}} @endforeach">

                <div class="d-flex flex-column flex-fill justify-content-around parent">
                    @foreach($photos as $photo)
                        @if($company['id']==$photo['company_id'])
                            <a href="company/{{$company['id']}}"
                               class="mx-auto  d-flex justify-content-center align-items-center logo-link {{$company->name}}"
                               style="background-image: url({{asset ('companies/'.$company['id'].'/'.$photo['name'])}});">


                            </a>
                        @endif
                    @endforeach
                    <a href="company/{{$company['id']}}" class="text-center align-self-end mx-auto">
                        <h5 class="compname container-fluid text-align-center">{{$company->name}}</h5>
                    </a>
                    <p class="card-text mx-auto">
                        <small class="text-muted">
                            @foreach($company -> tags as $tag)
                                {{$tag->name}}
                            @endforeach


                        </small>
                    </p>


                </div>


            </div>
        @endforeach


    </section>



@endsection

@push('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{{--    <link rel="stylesheet" href="{{asset('css/catalogue.css')}}">--}}

    <script src="{{ asset('js/catalogue.js') }}"></script>


@endpush
