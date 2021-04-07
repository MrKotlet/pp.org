<div class="">


    <div class="row p-4">
        @foreach($company->tags as $tag)

            <div class="tag-static tag-active align-items-center tag-w">
                <p for="tags[]" class="my-auto">{{$tag->name}}</p>

            </div>


        @endforeach
    </div>
    <button class="btn btn-success modal-toggle" data-modal="#ex3">edit tags</button>
</div>


{{--modal--}}

<div id="ex3" class="my-modal">
    <div class="wrapper">

        <div>

            <h4>Choose tags</h4>

        </div>

        <div class="f-div">

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
        <div class="modal-close"><i class="fas fa-times"></i></div>

    </div>
</div>

