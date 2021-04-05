@extends('layouts.app')

@section('content')
    <div class="container mx-auto">


        <form action="/newm/{{$company->id}}" method="POST">
            @csrf
            <label for="conclude">chcę brać udział w sesji B2B</label>

            <div class="row">
                @foreach($event->dates as $date)
                    <ul>
                        <p>{{$date->date}}</p>
                        @foreach($date->hours as $hour)

                            @if($company->hours->contains($hour->id) )
                            <li>
                                <label for="hours">{{$hour->hours}}</label>

                                    <input type="radio" name="hours" value="{{$hour->id}}" id="hours">


                            </li>
                            @endif
                        @endforeach

                    </ul>
                @endforeach
            </div>
            <button type="submit"></button>
        </form>

    </div>

@endsection
