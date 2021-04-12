<div class="photo-card ">

                <div class="card m-4 " style="width: 18rem">


                    @if($photo)
            <img class="card-img-top" src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" alt="Card image cap">
            <div class="card-body">

                <div class="row justify-content-around">
                    <form action="{{action ('HomeController@deleteother')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$company['id']}}" name="companyid">
                        <input type="hidden" value="{{$photo['id']}}" name="photoid">
                        <input type="hidden" value="{{$photo['name']}}" name="photoname">
                        <div class="row">
                            <button type="submit" class="btn btn-primary mx-1">Delete</button>
{{--                            @if($type=='other')--}}
{{--                                <a href="/setasmain/{{$company->id}}/{{$photo->id}}" class="btn btn-success">ustaw jako główne</a>--}}
{{--                            @endif--}}
                        </div>
                    </form>
                </div>
            </div>
                    @else
                    <div class="card-body add-other">
                        <a href="#ex4" rel="modal:open" class="dodaj modal-toggle" data-modal="#ex4">
                            <i class="fas fa-plus"></i>
                            <p class="dodaj">Add photo</p>
                        </a>
                    </div>
                    @endif
        </div>


</div>
{{--modal--}}


<div id="ex4" class="my-modal">
    <div class="wrapper">

        <div>

            <h4>Add photo from your disc</h4>


        </div>

        <div class="f-div">

            <form action="{{ action ('HomeController@storemedia')}}" method="POST" role="form" enctype="multipart/form-data" id="form2">

                @csrf
                <input type="hidden" value="{{$company['id']}}" name="id">

                @if(!$company->photos()->first())
                    <input type="hidden" value="main" name="type">

                @else
                    <input type="hidden" value="other" name="type">

                @endif

                <input class="form-control-file" id="formFileSm" type="file" name="photo" onchange="ValidateSize(this, 2)">
                <p>(max size 5mb, accepted extensions: svg, jpg, png)</p>

                <br>
                <button type="submit" class="btn btn-primary">save</button>
                <br>
            </form>

        </div>
        <div class="modal-close"><i class="fas fa-times"></i></div>

    </div>
</div>
