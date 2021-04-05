<div class="tag-div m-1">
    @if($company && $company->tags->contains($tag->id) )
    <div class="tag-i tag-active row align-items-center">
        <p for="tags[]" class="my-auto" >{{$tag->name}}</p>
        <span style=" color: white" class="fspan m-1 my-auto">
            <i class="fas fa-check-circle"></i>
        </span>
        @else
            <div class="tag-i tag-non row align-items-center">
                <p for="tags[]" class="my-auto" >{{$tag->name}}</p>
                <span style=" color: white" class="fspan d-none m-1 my-auto">
            <i class="fas fa-check-circle"></i>
        </span>
                @endif

        <br>

    </div>
    @if($company && $company->tags->contains($tag->id) )
        <input type="checkbox" class="form-control" name="tags[]" value="{{$tag -> id}}" checked="checked">
    @else
        <input type="checkbox" class="form-control" name="tags[]" value="{{$tag -> id}}">
    @endif
</div>






