<div class="d-flex justify-content-center">
    <div class="row name-display">
        <p class="display-4">{{$company->name}}</p>
        <button class="btn btn-success">Change</button>
    </div>
    <div class="name-form d-none">
        <form action="/editName" method="POST" role="form" id="name-changer">
            @csrf
            <div class="form-group mb-2 row justify-content-center">

                <input value="{{$company->id}}" name="id" hidden>
                <input value="name" name="data" hidden>
                <input type="text" value="{{$company->name}}"  class="form-control name-input" id="name" name="name" required minlength="2" maxlength="70">

                <button type="submit" class="btn btn-primary mx-1">save</button>
                <button class="btn btn-danger mx-1 cancel-name">cancel</button>
            </div>

        </form>
    </div>
</div>
