@extends('home')

@section('usercontent')

    <div  class="col-9 "  >
        @foreach($companies as $company)
        <div class="card d-flex flex-column">
            <div class="card-header">Media settings</div>

            <div class="row">
                @if($logos)
            @foreach($logos as $logo)


                <div class="col-3 d-flex align-items-center">
                    <img class="w-100 p-4 mx-auto my-auto" src="{{asset ('companies/'.$company['id'].'/'.$logo['name'])}}">

                </div>






                            <div class="form-group">


                                <p>{{$logo['type']}}</p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                    Change
                                </button>







                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Choose file from Your disk</h5>


                                                <div class="form-group">
                                                    <form action="{{ action ('HomeController@change')}}" method="POST" role="form" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{$company['id']}}" name="id">
                                                        <input type="hidden" value="{{$logo['id']}}" name="photoid">
                                                        <input type="hidden" value="{{$logo['name']}}" name="photoname">
                                                    <input name="changel" type="file" class="form-control-file" id="changel">
                                                </div>


                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>










            @endforeach
                @else
                <div class="col-9">
            <form class="p-4" action="{{ action ('HomeController@storelogo')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{$company['id']}}" name="id">

                <div class="form-group">
                    <label for="logo">Add Logo</label>
                    <input name="logo" type="file" class="form-control-file" id="logo">
                </div>

                <button type="submit" class="btn btn-primary">+ Add</button>
            </form>
                </div>
                    @endif
            </div>
            <hr>



            <div class="row">


                @if($mains)
                    @foreach($mains as $main)


                    <div class="col-3 d-flex align-items-center">
                            <img class="w-100 p-4 mx-auto my-auto" src="{{asset ('companies/'.$company['id'].'/'.$main['name'])}}">
                        </div>


                            <div class="form-group">


                                <p>{{$main['type']}}</p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mexampleModalLong">
                                    Change
                                </button>


                                <div class="modal fade" id="mexampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Choose file from Your disk</h5>


                                                <div class="form-group">
                                                    <form action="{{ action ('HomeController@change')}}" method="POST" role="form" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{$company['id']}}" name="id">
                                                        <input type="hidden" value="{{$main['id']}}" name="photoid">
                                                        <input type="hidden" value="{{$main['name']}}" name="photoname">
                                                    <input name="changel" type="file" class="form-control-file" id="changel">
                                                </div>


                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach


                @else
                    <div class="col-9">
            <form class="p-4" action="{{ action ('HomeController@storemain')}}" method="POST" enctype="multipart/form-data">
                @csrf


                    <input type="hidden" value="{{$company['id']}}" name="id">


                <div class="form-group">
                    <label for="exampleFormControlFile1">Add Main Photo</label>
                    <input  name="main"  type="file" class="form-control-file" id="exampleFormControlFile1" id="main">
                </div>

                <button type="submit" class="btn btn-primary">+ Add</button>
            </form>
                    </div>
                @endif
            </div>

            <hr>
            <form class="p-4" action="{{ action ('HomeController@storeother')}}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf


                        <input type="hidden" value="{{$company['id']}}" name="id">

                    <label for="exampleFormControlFile1">Add Photo</label>
                    <input  name="other" type="file" class="form-control-file" id="exampleFormControlFile1" id="other">
                </div>

                <button type="submit" class="btn btn-primary">+ Add</button>
            </form>


            <div class="card-header">Your Company photos</div>
            <div class="row justify-content-center">

                @foreach($photos as $photo)
                    @if($photo['type']=='other' )

                        <div class="card m-4" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset ('companies/'.$company['id'].'/'.$photo['name'])}}" alt="Card image cap">
                            <div class="card-body">

                                <div class="row justify-content-around">
                                    <form action="{{action ('HomeController@deleteother')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <input type="hidden" value="{{$company['id']}}" name="companyid">
                                    <input type="hidden" value="{{$photo['id']}}" name="photoid">
                                    <input type="hidden" value="{{$photo['name']}}" name="photoname">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach






            </div>


        </div>
        @endforeach

    </div>



@endsection
