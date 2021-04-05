
@extends('layouts.appeng')

@section('content')
    <header id="home" style="background-image: url(imgcss/start_photo.jpg);">
        <div class="hero-shadow" ></div>
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
            <div class="badge-pill d-flex align-items-center">
                <img class="mx-auto"  src="{{asset('storage/pages/logod.svg')}}">
            </div>
            <p class="display-1">Polish Fashion</p>
            <p class="header-text mb-5">Online platform created for entrepreneurs</p>
            <div class="row justify-content-around mx-auto w-60">
                <a href="/catalogue/eng" class="btn btn-outline-light">Catalogue</a>
                <a href="/events/eng" class="btn btn-outline-light">Events</a>
            </div>
        </div>
    </header>
<br>
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
            <p>As part of the program for the promotion of the Polish Fashion industry , an <b>
                    online platform for entrepreneurs participating in the program was launched.</b></p>

            <p>It is intended for representatives of companies who cannot travel and participate in the fair event in person.
                Polish entrepreneurs can use the platform as a <b>professional channel for B2B meetings with business partners taking part at the fair.</b></p>

            <p>
                <b>Streaming of events taking place at the fair </b>
                are also carried out via the platform. Thanks to this, users have convenient online
                access to points realized as part of an exhibition event and can adjust their message and
                offer to the profile of contractors participating in a given event.
            </p>

{{--            <p>Platforma online Polish Fasion umożliwia ponadto <b> rejestrację i założenie profilu firmowego,</b> w ramach--}}
{{--                którego przedsiębiorcy mogą prezentować swoje produkty zainteresowanym uczestnikom targów.</p>--}}
            <br>

        </div>
<hr>
        <div>

            <h1 class="display-4 display-md-3 text-center">Polish Fashion – Industry Promotion Program </h1>
            <h3 class="text-center">(Polish Fashion Industry Promotion Program)</h3>
            <br>
            <div>
                <p>
                    Polish Fashion, covered by the promotion program prepared by the Ministry of
                    Economic Development, Labor and Technology is an industry with high export and
                    image potential. One of its main advantages is the wide range of high-quality products
                    presented by Polish producers in various sectors of activity, including the clothing, footwear and jewelry sectors.
                </p>

                <p>
                    Polish Fashion Industry Promotion Program is aimed at promoting the entire Polish
                    fashion industry along with the above-mentioned sectors. As part of the program, national
                    information and promotion stands are organized at the largest industry fair events, where Polish
                    companies have the opportunity to present their offer and advertising films, as well as conduct
                    B2B meetings with contractors from countries around the world. What is more, additional activities
                    such as a shared online platform, press briefings, a fashion show at the national stand or an interactive
                    map of visitors are organized to promote Polish companies and brands.
                </p>

                <span>More information about the Polish Fashion Industry Promotion Program is available
                    <a href="https://programybranzowe.pl/en/polish-fashion/"  class="btn btn-danger tutaj" target="_blank">here</a></span>

            </div>



        </div>

    </section>




@endsection
