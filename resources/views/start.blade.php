@extends('layouts.app')

@section('content')
    <header id="home" style="background-image: url(imgcss/start_photo.jpg);"
            >
        <div class="hero-shadow"></div>
        <div
            class="container h-100  text-light text-center ">
            <div class="main-logo" style="background-image: url(/imgcss/logod.svg);"></div>
            <p class="display-3">Polish Aviation and Automotive Parts</p>
            <p class="header-text">Online platform created for entrepreneurs</p>
            <div class="row justify-content-center mx-auto w-60">
                <a href="/catalogue" class="btn btn-outline-light">Catalogue</a>
                <a href="/events" class="btn btn-outline-light">Events</a>
            </div>
        </div>
    </header>

    <section class="container">
        {{--        <h1 class="display-3 text-center">Polish Fashion</h1>--}}
        {{--        <h3 class="text-center">Platforma Online stworzona dla przedsiębiorców</h3>--}}
        <br>
        <div class="container d-flex flex-wrap justify-content-center justify-content-md-between mx-auto">


            <div class="start d-flex flex-column justify-content-around align-items-center">
                <img src="{{asset ('images/Zasób 1.png')}}">
                <h3>A convenient way to communicate with international trading partners</h3>
            </div>

            <div class="start d-flex flex-column justify-content-around align-items-center">
                <img src="{{asset ('images/Zasób 10.png')}}">
                <h3>Streaming from trade fair events</h3>
            </div>

            <div class="start d-flex flex-column justify-content-around align-items-center">
                <img src="{{asset ('images/Zasób 11.png')}}">
                <h3>Possibility to present products on your company profile</h3>
            </div>

        </div>
        <br>
        <div>
            <p>As part of the program for the promotion of the Polish Fashion industry , an <b>online platform for
                    entrepreneurs participating in the program was launched.</b></p>

            <p>It is intended for representatives of companies who cannot travel and participate in the fair event in
                person. Polish entrepreneurs can use the platform as a<b>professional channel for B2B meetings with
                    business partners taking part at the fair.</b></p>

            <p><b>Streaming of events taking place at the fair </b>
                are also carried out via the platform. Thanks to this, users have convenient online access to points
                realized as part of an exhibition event and can adjust their message and offer to the profile of
                contractors participating in a given event.</p>


            <br>

        </div>
        <hr>
        <div>

            <h1 class="display-4 display-md-3 text-center">Polish Aviation and Automotive Parts – Industry Promotion
                Program </h1>
            <h3 class="text-center d-none">(BPP Moda Polska)</h3>
            <br>
            <div>
                <p>
                    Polish Automotive and Aviation Parts Promotion Program was prepared by the Ministry of Economic
                    Development, Labour and Technology.
                </p>
                <p>
                    The activities carried out under the program are aimed at promoting the Automotive and Aviation
                    Parts industry abroad and primarily include the organization of information and promotion stands at
                    selected industry fairs and conferences. The stands will be organized in Germany, the USA, France,
                    China, Great Britain and Russia.
                </p>

                <p>
                    The organization of national stands at one of the largest international fair events in a given
                    industry will contribute to increasing the recognition of Polish products in the world. At the
                    stands, a zone for B2B meetings will be separated, which will increase the possibility of
                    establishing new contacts with potential contractors.
                </p>
                <p>
                    Each company participating in the program has the opportunity to provide the program operator with a
                    promotional film, which will be displayed on multimedia equipment during the fair. A number of other
                    additional creative activities promoting Polish companies during the events are also planned. Polish
                    entrepreneurs can take part in the events as exhibitors (their own stand) or as visitors (with the
                    possibility of using the national stand).
                </p>

                <span>More information about the Polish Aviation and Automotive Parts Industry Promotion Program is available
                    <a href="https://programybranzowe.pl/en/polish-fashion/" class="btn btn-danger tutaj"
                       target="_blank">here</a></span>

            </div>


        </div>

    </section>




@endsection
