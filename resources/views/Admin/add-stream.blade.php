@extends('layouts.admin')

@section('admin')
    <div class="col-10">
        <p class="display-3">New Stream</p>
        <form action="/createStream" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream description</label>
                <textarea class="form-control" name="opis"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream key</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                       name="link">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream date</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                       name="date">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">add thumbnail</label>
                <input class="form-control" type="file" id="formFile" name="photo">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Event</label>
                <select class="form-select" id="inputGroupSelect01" name="event_id">
                   @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Chat Channel</label>
                <select class="form-select" id="inputGroupSelect01" name="chat">
                    @foreach($chats as $chat)
                        <option value="{{$chat->id}}">{{$chat->id}}</option>
                    @endforeach
                </select>
            </div>



            <button type="submit" class="btn btn-warning">save</button>
        </form>


    </div>



@endsection

