<div class="g-0 m-0 start-div ">
    <div>
        <p class="usr-header">Hello {{$user['name']}}!</p>
    </div>
    <hr/>
    @if($company)

        <div class="company-welcome m-3">
            @if($photo)
                <div class="usr-logo">
                    <img class="w-100" src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}">
                </div>
            @endif
            <div class="usr-name">
                <p class="usr-header">{{$company['name']}}</p>
            </div>
                <div class="row p-2 btn-group">
                    <a class="button" href="/step2">
                        <button type="button" class="btn btn-success usr-btn">Edit Company Profile</button>
                    </a>
                    <a class="button" href="/usersettings">
                        <button type="button" class="btn btn-success usr-btn">Account settings</button>
                    </a>
                    <a class="button" href="/company/{{$company['id']}}">
                        <button type="button" class="btn btn-success usr-btn">Company site preview</button>
                    </a>
                </div>

        </div>
        @if(!$company['verified'])
            <div class="border bg-danger text-light p-5">
                <i class="fas fa-times"></i>
                <br>
                <p class="">Your company has not been verified yet. The verification process can take up to 48 hours.
                    If you have any questions, please do not hesitate to contact us</p>
                <strong class=" my-1">Thank You for your patience</strong>
                <br>
            </div>
            <br>
        @endif

    @else

        <div>


            <div class="jumbotron bg-danger d-flex flex-column container-fluid">
                <h1 class="display-4 text-light">It looks like a company profile has not been created yet.</h1>
                <p class="text-light">You can do it in the "Create Company Profile" tab.</p>
                <hr class="my-4 white-hr">
                <br>
                <p class="text-light align-self-end">Or just click here</p>
                <a class="btn btn-light btn-lg col-6 col-sm-3 align-self-end " href="step1" role="button">Show your
                    Company!</a>


            </div>


        </div>

    @endif
</div>

@if($notes->where('age','new')->count())

    <a href="/notifications">
        <button class="badge-pill btn-danger  notes-info"><span>You have {{$notes->where('age','new')->count()}} new
                notifications</span> <i class="fas fa-bell"></i>
        </button>
    </a>

@endif









@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
{{--    <link rel="stylesheet" href="{{asset('css/userpanel/userstart/userstartc.css')}}">--}}
    <script src="{{ asset('js/userpanel/userstart/userstartc.js') }}"></script>
@endpush
