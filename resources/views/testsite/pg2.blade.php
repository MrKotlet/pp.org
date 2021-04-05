@extends('layouts.app')

@section('content')

    @foreach($notes as $note)
    <div class="border mx-auto col-10">

        <h1>Nowa propozycja spotkania od {{$user->name}}, {{$note->meeting->status}}</h1>
        <h2>Data: {{$note->meeting->date}}, Godzina: {{$note->meeting->hours}}</h2>
        <div>
            <a href="/meetok/{{$note->meeting->id}}"><button class="btn-lg btn-primary">Zaakceptuj</button></a>
            <a href="/meetnope/{{$note->meeting->id}}"><button class="btn-lg btn-danger">Odrzuć</button></a>
        </div>


    </div>




    @endforeach




@endsection



