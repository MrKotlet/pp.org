@extends('layouts.app')

@section('content')

    @foreach($meets as $meet)

        <h2>Spotkanie z {{$meet->user->name}}</h2>
        <p>Data: {{$meet->date}}, Godzina: {{$meet->hours}}</p>


        <a href="/meetroom/{{$meet->id}}"><button class="btn-lg btn-primary">pokój spotkań</button></a>



    @endforeach


@endsection



