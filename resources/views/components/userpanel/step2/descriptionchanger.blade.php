<div class="description-changer">




    @if($company->opis !== '')
        <div class="description">
            <p>
                {{$company->opis}}
            </p>
        </div>
    @endif
  <div class="desc-form">

      <form action="{{ action ('HomeController@description')}}" method="POST" role="form">
          @csrf
          <input type="hidden" value="{{$company['id']}}" name="id">
          <div class="form-group">
              @if($company->opis == '')
              <textarea  name="opis" class="form-control textarea" id="exampleFormControlTextarea1">Add description (max 300 words)</textarea>
              @else
                  <textarea  name="opis" class="form-control textarea" id="exampleFormControlTextarea1">{{$company->opis}}</textarea>
                  @endif
          </div>
          <button type="submit" class="btn btn-primary">save</button>
          <button class="btn btn-danger cancel-desc">cancel</button>
      </form>


  </div>

@if($company->opis == '')

    <div class="row slide px-3">

        <button class="btn btn-success m-1">Add description</button>
    </div>
@else
    <div class="row switch px-3">

        <button class="btn btn-success m-1">Edit description</button>
    </div>
@endif




</div>
