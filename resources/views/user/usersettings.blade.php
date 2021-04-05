@extends('home')

@section('usercontent')

    <div  class="col-10 col-lg-7 g-0 mx-auto "  >

        <div class="">
            <h3 class="p-4 display-4">Account settings</h3>

            <div class="p-4">

                <form action="{{ action ('HomeController@editemail')}}" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Change e-mail address</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter new email">
                        </div>

                        <button type="submit" class="btn btn-success">save</button>


                    </div>
                </form>


                <form class="d-none">
                        <hr>
                        <p >Zmień hasło</p>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Stare hasło</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Old password">
                        </div>
                    <div class="form-group">
                            <label for="exampleInputPassword1">Nowe hasło</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New password">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputPassword1">Powtórz nowe hasło</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New password">
                    </div>

                    <button type="submit" class="btn btn-success">Zapisz</button>





                </form>


            </div>
        </div>


    </div>



@endsection
