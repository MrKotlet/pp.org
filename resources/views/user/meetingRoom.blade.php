@extends('layouts.app')

@section('content')

    <div id="meet" class="container-fluid row justify-content-center mx-auto video-container"></div>


<br>
    <div class="container-fluid row justify-content-center">
<a href="#" class="meet-end"><button class="btn-lg btn-outline-danger meet-end">End the meeting</button></a>
    </div>
@endsection





@push('scripts')
    <link rel="stylesheet" href="{{asset('css/userpanel/notesList.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src='https://jkdsgn.pl/external_api.js'></script>
    <script>
        const domain = 'jkdsgn.pl';
        const options = {
            roomName: '{{$company->name}}',
            width: 1400,
            height: 900,
            parentNode: document.querySelector('#meet')
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
@endpush

