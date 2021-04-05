@extends('home')

@section('usercontent')

    <div class="col-12 col-lg-10 step2-div">
        <br>
        <h3 class="">Company Profile Creator</h3>
        <h2 class=" display-4">Step 2: Show Your Company! </h2>
        <small>(You can edit it later)</small>
        <hr>


        <div class="step-all col-12 row">
            <div class="step2-face col-12 col-lg-5 g-0">

                <h3 class="some-space">Company Logo</h3>

                <x-userpanel.step2.profilepictures :company="$company" :logo="$logo" :main="$main"/>
                <hr>
                <h3 class="some-space">Company Name</h3>
                <x-userpanel.step2.namechanger :company="$company"/>


            </div>

            <div class="step2-desc col-12 col-lg-6 g-0">
                @if($company->opis =='')
                    <h3 class="some-space">Tell us something about Your Company</h3>
                @else
                    <h3 class="some-space">About Company</h3>
                @endif
                <hr>
                <x-userpanel.step2.descriptionchanger :company="$company"/>

            </div>

        </div>

        <hr>
        <h3 class="some-space">Tags:</h3>
        <x-userpanel.step2.tagchanger :company="$company" :tags="$tags"/>
        <hr>


        <h3 class="some-space">Gallery</h3>
        <div class="row justify-content-around">
            @if($others->count() < 6)
                <x-userpanel.step2.photocard :company="$company" :type="'add'" :photo="0"/>
            @endif

            @if($main)
                <x-userpanel.step2.photocard :company="$company" :type="'main'" :photo="$main"/>
            @endif

            @if($others)
                @foreach($others as $photo)
                    <x-userpanel.step2.photocard :company="$company" :type="'other'" :photo="$photo"/>
                @endforeach
            @endif


        </div>

    </div>














    @push('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>

        <link rel="stylesheet" href="{{asset('css/userpanel/tags/tagselector.css')}}">
        <script src="{{ asset('js/userpanel/tags/tagselector.js') }}"></script>
        <link rel="stylesheet" href="{{asset('css/userpanel/step2/profilepictures.css')}}">
        <script src="{{ asset('js/userpanel/step2/profilepictures.js') }}"></script>
        <link rel="stylesheet" href="{{asset('css/userpanel/step2/namechanger.css')}}">
        <script src="{{ asset('js/userpanel/step2/namechanger.js') }}"></script>
        <link rel="stylesheet" href="{{asset('css/userpanel/step2/tagchanger.css')}}">
        <script src="{{ asset('js/userpanel/step2/tagchanger.js') }}"></script>
        <link rel="stylesheet" href="{{asset('css/userpanel/step2/descriptionchanger.css')}}">
        <script src="{{ asset('js/userpanel/step2/descriptionchanger.js') }}"></script>
        <link rel="stylesheet" href="{{asset('css/userpanel/step2/photocard.css')}}">
        <script src="{{ asset('js/userpanel/step2/photocard.js') }}"></script>

    @endpush





@endsection
