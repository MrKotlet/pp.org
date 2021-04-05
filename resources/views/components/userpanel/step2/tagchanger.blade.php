<div class="">




    <div class="row p-4">
    @foreach($company->tags as $tag)

        <div class="tag-static tag-active align-items-center tag-w">
            <p for="tags[]" class="my-auto" >{{$tag->name}}</p>

        </div>


    @endforeach
    </div>
    <a href="#ex3" rel="modal:open" class="dodaj"><button class="btn btn-success">edit tags</button></a>
</div>


{{--modal--}}

    <div id="ex3" class="modal">
        <div class="modal-content tag-align">
            <div class="row mx-auto align-items-center">
                <h4 class="p-3">Choose tags</h4>

            </div>
            <br>
            <div class="form-group my-auto mx-auto ">

                <form action="{{ action ('HomeController@editTags')}}" method="POST" role="form">
                    @csrf
                    <input value="{{$company->id}}" name="id" hidden>
                    <div class="row p-4 m-1">
                        @foreach($tags as $tag)
                            <x-userpanel.tags.tagselector :tag="$tag" :company="$company"/>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-auto">save</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

