@if($logo)
<style>
    #logo-place{
        background-image: url({{asset ('companies/'.$company['id'].'/'.$logo['name'])}});
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
    }



</style>
@endif


<div class="d-flex justify-content-center align-items center">





        <a  class="dodaj modal-toggle" data-modal="#ex5">

            <div id="logo-place" class=" d-flex align-items-center justify-content-center mx-5 my-auto" >
                @if($logo)

                    <p class="dodaj d-none">Change Logo</p>
                @else



                    <i class="fas fa-plus"></i>
                    <p class="dodaj">Add Logo</p>
                @endif


            </div>
        </a>

</div>

{{--logo modal--}}






<div id="ex5" class="my-modal">
    <div class="wrapper">

        <div>

            <h4>Add Logo from disc</h4>


        </div>

        <div class="f-div">

            @if($logo)
                <form action="{{ action ('HomeController@change')}}" method="POST" role="form" enctype="multipart/form-data" id="form1">

                    @csrf
                    <input type="hidden" value="{{$company['id']}}" name="id">
                    <input type="hidden" value="{{$logo['id']}}" name="photoid">
                    <input type="hidden" value="{{$logo['name']}}" name="photoname">
                    <input name="changel" type="file" class="form-control-file" id="changel" onchange="ValidateSize(this, 1)">
                    <p>(max size 5mb, accepted extensions: svg, jpg, png)</p>
                    <button type="submit" class="btn btn-primary">save</button>
                    <br>
                </form>
                    @else
                        <form action="{{ action ('HomeController@storemedia')}}" method="POST" role="form" enctype="multipart/form-data" id="form1">

                            @csrf
                            <input type="hidden" value="{{$company['id']}}" name="id">
                            <input type="hidden" value="logo" name="type">
                            <input class="form-control-file" id="formFileSm" type="file" name="photo" onchange="ValidateSize(this, 1)">

                            <p>(max size 5mb, accepted extensions: svg, jpg, png)</p>

                            <button type="submit" class="btn btn-primary">save</button>

                        </form>
            @endif
        </div>
        <div class="modal-close"><i class="fas fa-times"></i></div>

    </div>
</div>



