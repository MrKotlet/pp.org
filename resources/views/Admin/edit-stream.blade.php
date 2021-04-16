@extends('layouts.admin')

@section('admin')
    <div class="col-10">
        <p class="display-3">Edit Stream - {{$stream->name}}</p>
        <form action="/saveEditStream" method="post" enctype="multipart/form-data">
            <input type="text" value="{{$stream->id}}" name="streamId" hidden>
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream name</label>
                <input type="text" class="form-control" value="{{$stream->name}}"
                       name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream description</label>
                <textarea class="form-control" name="opis">{{$stream->opis}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream key</label>
                <input type="text" class="form-control" value="{{$stream->link}}"
                       name="link">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">stream date</label>
                <input type="text" class="form-control" value="{{$stream->date}}"
                       name="date">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">edit thumbnail</label>
                <input class="form-control" type="file" id="formFile" name="photo">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Event</label>
                <select class="form-select" id="inputGroupSelect01" name="event_id">
                    @foreach($events as $event)
                        @if($event->id == $stream->event->id)
                            <option value="{{$event->id}}" selected>{{$event->name}}</option>
                        @else
                            <option value="{{$event->id}}">{{$event->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Chat channel</label>
                <select class="form-select" id="inputGroupSelect01" name="chat">
                    <option value="{{$selectedChat->id}}" selected>{{$selectedChat->id}}</option>
                    @foreach($chats as $chat)

                        <option value="{{$chat->id}}">{{$chat->id}}</option>

                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-warning">save</button>
        </form>
        <hr>
        <div class="border col-3 d-flex flex-column align-items-center pb-3 pt-3">
            <img src="{{asset('/thumbnails/'.$stream->photo->name)}}" alt="" class="w-100">
            <p>Current Thumbnail</p>



        </div>
    </div>






@endsection

