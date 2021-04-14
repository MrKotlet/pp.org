@extends('layouts.admin')

@section('admin')
    <div class="col-10">
        <p class="display-3">Edit Event - {{$event -> name}}</p>
        <form action="/saveEdit" method="post">
            @csrf
            <input type="text" hidden value="{{$event->id}}" name="id">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="name" value="{{$event->name}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event Description</label>
                <textarea class="form-control" name="opis">{{$event->opis}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event official page</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="homepage" value="{{$event->homepage}}" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event location</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="location" value="{{$event->location}}">
            </div>
            <div class="row">
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">Year</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="year" value="{{$event->year}}">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">Start month</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="startMonth" value="{{$event->startMonth}}">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">Start day</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="startDay" value="{{$event->startDay}}">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">End month</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="endMonth" value="{{$event->endMonth}}">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">End day</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="endDay" value="{{$event->endDay}}">
                </div>

            </div>


            <button type="submit" class="btn btn-warning">save</button>
        </form>


    </div>



@endsection
