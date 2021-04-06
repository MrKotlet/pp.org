@extends('home')

@section('usercontent')

    <div class="col-12 col-lg-10 meeting-div ">
        <br>

        <h3>The next networking session will take place during the event:</h3>
        <h1 class="display-3">{{$event->name}}</h1>
        <p class="mx-1">{{$event->date}}</p>
        @if($company->b2b!=1)
            <button class="btn-lg btn-outline-success form-toggler">I want to participate in a B2B session</button>

            <br>
            <form action="/cd/{{$company->id}}" method="POST" class="form p-0 d-none g-0 col-12">
                @csrf
                <input name="b2b" id="b2b" type="checkbox" value="1" hidden>
                @else
                    <button class="btn-lg btn-success form-toggler">I want to participate in a B2B session</button>

                    <br>
                    <form action="/cd/{{$company->id}}" method="POST" class="form p-0 g-0 col-12">
                        @csrf
                        <input name="b2b" id="b2b" type="checkbox" value="1" hidden checked>


                        @endif


                        <br>
                        <h3>Tick the times when you are available</h3>
                        <hr>
                        <div class="d-flex justify-content-start col-12 col-lg-8 g-0 p-0 shadow form-inside">
                            @foreach($dates as $date)
                                <div class="p-0 col-4 g-0">

                                    <div class="date-form border"><p class="m-auto px-3">{{$date->date}}</p></div>

                                    @foreach($date->hours()->orderBy('hours', 'asc')->get() as $hour)

                                        <div class="calendar-input">

                                            @if($company->hours->contains($hour->id) )
                                                <div
                                                    class=" d-flex align-items-center justify-content-around input-div input-checked">
                                                    <label for="hours[]" class="my-auto">{{$hour->hours}}</label>
                                                    <i class="fas fa-dot-circle d-none"></i>
                                                    <i class="fas fa-check-circle"></i>
                                                    <input type="checkbox" name="hours[]" value="{{$hour->id}}"
                                                           id="hours[]"
                                                           class="d-none hour-input" checked>
                                                </div>

                                            @else
                                                <div class="d-flex align-items-center justify-content-around input-div">
                                                    <label for="hours[]" class="my-auto">{{$hour->hours}}</label>
                                                    <i class="fas fa-dot-circle"></i>
                                                    <i class="fas fa-check-circle d-none"></i>
                                                    <input type="checkbox" name="hours[]" value="{{$hour->id}}"
                                                           id="hours[]"
                                                           class="d-none hour-input">
                                                </div>

                                            @endif
                                        </div>
                                    @endforeach

                                </div>
                            @endforeach
                        </div>
                        <br>
                        <button class="btn-lg btn-success " type="submit">save</button>
                    </form>

    </div>

@endsection

@push('scripts')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>

{{--    <link rel="stylesheet" href="{{asset('css/userpanel/meetingsForm.css')}}">--}}
    <script src="{{ asset('js/userpanel/meetingsForm.js') }}"></script>
@endpush
