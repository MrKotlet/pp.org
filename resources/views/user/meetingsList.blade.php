@extends('home')

@section('usercontent')
    <div class="p-4 col-12 col-lg-10">
        @if($meets->isEmpty())
            <h2>You don't have scheduled meetings</h2>
        @else
            <h1 class="display-2 px-4">Meetings List </h1>
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


                            <p>Date: {{$meet->hour->date->showDate()}}, Time: {{$meet->hour->showHour()}}</p>
                        </div>
                        <div class="d-flex flex-row flex-lg-column align-items-center">
                            <a href="/meetroom/{{$meet->id}}">
                                @if($meet->hour->hour>=$h && $meet->hour->hour<$h+1 && $meet->hour->date->day == $d)
                                <button class="btn-lg btn-primary" >meeting room</button>
                                @else
                                    <button class="btn-lg btn-outline-primary" disabled>meeting room</button>
                                @endif
                            </a>
                            <br>
                            <a data-modal="{{$meet->id}}" class="meet-cancel">
                                <button class="btn btn-outline-danger">Cancel</button>
                            </a>
                        </div>

                    </div>
                    <hr>
                @endif

            @endforeach


        @endif
    </div>
    {{--modal--}}


    <div  class="my-modal confirmation">
        <div class="wrapper">

            <div>

                <h4>Are You sure?</h4>

            </div>

            <div class="">
                <a href="/meetnope/{{$meet->id}}" class="delete">
                    <button class="btn btn-outline-danger">Yes</button>
                </a>
                <a class="confirmation-close">
                    <button class="btn btn-primary">No</button>
                </a>


            </div>
            <div class="modal-close"><i class="fas fa-times"></i></div>

        </div>
@endsection
@push('scripts')

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="{{ asset('js/userpanel/modal.js') }}"></script>

@endpush
