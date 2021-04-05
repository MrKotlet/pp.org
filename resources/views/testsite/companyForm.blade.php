@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <br>
<h2>Company dates form</h2>
    <h2>{{$company->name}}</h2>
<h2>{{$event->name}}</h2>

<form action="/cd/{{$company->id}}" method="POST">
   @csrf
    <label for="conclude">chcę brać udział w sesji B2B</label>
    <input type="checkbox" name="conclude" id="conclude">
    <div class="row">
        @foreach($dates as $date)
        <ul>
            <p>{{$date->date}}</p>

            @foreach($date->hours()->orderBy('hours', 'asc')->get() as $hour)
                <li>
                    <label for="hours[]">{{$hour->hours}}</label>
                    @if($company->hours->contains($hour->id) )
                        <input type="checkbox" name="hours[]" value="{{$hour->id}}" id="hours[]" checked>
                    @else
                        <input type="checkbox" name="hours[]" value="{{$hour->id}}" id="hours[]">
                    @endif
                </li>
            @endforeach

        </ul>
        @endforeach
    </div>
    <button type="submit"></button>
</form>

</div>

@endsection
