@extends('home')

@section('usercontent')

    <div  class="col-9"  >
        @if($companies)
            @foreach($companies as $company)
                <div class="card">
                    <div class="card-header">Edit Company</div>

                    <div class="card-body">
                        <form action="{{ action ('HomeController@editcompany')}}" method="POST" role="form">

                            @csrf
                            <input type="hidden" value="{{$company['id']}}" name="id">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
                                <input name="name" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$company['name']}}" placeholder="{{$company['name']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Company Description</label>
                                <textarea name="opis" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$company['opis']}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Homepage</label>
                                <input name="homepage" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$company['homepage']}}">
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>



                    </div>


                    </form>
                </div>
    </div>















            @endforeach

    @else
            <div class="card">
                <div class="card-header">Company settings</div>

                <div class="card-body">
                    <a href="/createcompany" class="badge badge-success">+ Add Company</a>
                </div>
            </div>
        @endif
    </div>



@endsection
