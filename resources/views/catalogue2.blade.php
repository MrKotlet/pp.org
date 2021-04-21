@extends('layouts.app')
<style>
    @foreach($photos as $photo)
    .{{$photo->company->name}}  {
        background-image: url({{asset ('companies/'.$photo->company->id.'/'.$photo['name'])}})

    }
    @endforeach
</style>
@section('content')

    <header id="home" class="home-b2b" style="background-image: url(imgcss/b2b.jpg);">
        <div class="hero-shadow"></div>
        <div
            class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <p class="display-1" id="test">B2B</p>
            @if($b2b)

                <p>List of Companies taking part in networking session</p>
            @else


                <p>There's no B2B session taking place right now</p>
                <p>The next B2B session will take place during next event</p>
            @endif


        </div>
    </header>






    @if($b2b)
        <section class="container row mx-auto justify-content-between">

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
    @endif

@endsection
@push('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/catalogue.css')}}">

    {{--    <script src="{{ asset('js/catalogue.js') }}"></script>--}}


@endpush
