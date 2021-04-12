<div class="tag-div m-1">
    @if($company && $company->tags->contains($tag->id) )
        <div class="tag-i tag-active">
            <p for="tags[]" class="my-auto">{{$tag->name}}</p>

            <i class="fas fa-check-circle"></i>
        </div>
    @else
        <div class="tag-i tag-non">
            <p for="tags[]" >{{$tag->name}}</p>

            <i class="fas fa-check-circle d-none"></i>


        </div>

    @endif

        @if($company && $company->tags->contains($tag->id) )
            <input type="checkbox" class="form-control" name="tags[]" value="{{$tag -> id}}" checked="checked">
        @else
            <input type="checkbox" class="form-control" name="tags[]" value="{{$tag -> id}}">
        @endif
</div>






