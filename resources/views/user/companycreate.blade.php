@extends('home')

@section('usercontent')

    <div  class="col-9"  >

        <div class="card">
            <div class="card-header">Add Company</div>

            <div class="card-body">
                <form action="{{ action ('HomeController@store')}}" method="POST" role="form">

                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input name="name" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name of your company">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Company Description</label>
                        <textarea name="opis" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Company Homepage</label>
                        <input name="homepage" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Homepage of your company">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>



                    </div>


                </form>
            </div>
        </div>


    </div>



@endsection
