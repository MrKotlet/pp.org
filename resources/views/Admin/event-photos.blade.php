@extends('layouts.admin')

@section('admin')
    <div class="col-10">
        <form action="/storePhoto" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden value="{{$id}}" name="id">
            <div class="mb-3">
                <label for="formFile" class="form-label">Add Photo</label>
                <input class="form-control" type="file" id="formFile" name="photo">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Photo Type</label>
                <select class="form-select" id="inputGroupSelect01" name="type">
                    <option selected>Choose...</option>
                    <option value="logo">Logo</option>
                    <option value="main">Main</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <button class="btn btn-warning">add</button>

        </form>
        <hr>
        @if($photos->isNotEmpty())
            <div class="row ">
                @foreach ($photos as $photo)
                    <div class="border col-3 d-flex flex-column align-items-center pb-3 pt-3">
                        <img src="{{asset ('eventPhotos/'.$id.'/'.$photo['name'])}}" alt="" class="w-100">
                        <p>{{$photo->type}}</p>

                            <div class="btn-group" role="group" >
                                <a href="/deletePhoto/{{$id}}/{{$photo->id}}/{{$photo->name}}" class="m-1"><button type="button" class="btn btn-danger" >Delete</button></a>
                                @if($photo->type == 'other')
                                    <a href="/setAsMain/{{$id}}/{{$photo->id}}" class="m-1"><button type="button" class="btn btn-success">Set as main</button></a>
                                @endif
                            </div>


                    </div>


                @endforeach
            </div>
        @endif

    </div>

@endsection
