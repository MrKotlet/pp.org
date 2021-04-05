@extends('home')

@section('usercontent')
    <div class="p-4 col-12 col-lg-10">
        @if($meets->isEmpty())
            <h2>You don't have scheduled meetings</h2>
        @else
            <h1 class="display-2 px-4">Meetings List</h1>
            <hr>
            @foreach($meets as $meet)
                @if($meet->status=='accepted')

                    <div class="row align-items-center meet-div col-12 ">

                        <div>

                            @if($user->id == Auth::id())
                                <h2 class="display-4">Meeting with {{$meet->company->name}}</h2>

                            @else
                                <h2>Meeting with {{$meet->user->name}}</h2>
                            @endif


                            <p>Date: {{$meet->date}}, Time: {{$meet->hours}}</p>
                        </div>
                        <div class="d-flex flex-row flex-lg-column align-items-center">
                            <a href="/meetroom/{{$meet->id}}">
                                <button class="btn-lg btn-primary">meeting room</button>
                            </a>
                            <br>
                            <a href="/meetnope/{{$meet->id}}">
                                <button class="btn btn-danger">Cancel</button>
                            </a>
                        </div>

                    </div>
                    <hr>
                @endif

            @endforeach


        @endif
    </div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="{{asset('css/userpanel/meetingsList.css')}}">

@endpush
