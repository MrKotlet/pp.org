@extends('home')

@section('usercontent')

<div  class="col-12 col-lg-8 g-0 step1-div">



        <div class="card-body">
            <h3 class="">Company Profile Creator</h3>
            <h2 class="">Step 1: Company Info</h2>
            <div class="">
                <form action="{{ action ('HomeController@store')}}" method="POST" role="form" id="step1"  data-parsley-validate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Company Name</label>
                        <input type="text" placeholder="company name" class="form-control" id="name" name="name" required data-parsley-type="alphanum">
                    </div>

                    <div class="form-group mb-2">
                        <label for="homepage">Official homepage address</label>
                        <input type="url" placeholder="homepage url" class="form-control" id="homepage" name="homepage" required>
                    </div>

                    <p>What does your company do?</p>
                    <div class="input-group mb-2">

                        @foreach($tags as $tag)
                            <x-userpanel.tags.tagselector :tag="$tag" :company="0"/>
                        @endforeach
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" >Save and move to step 2</button>
                </form>





            </div>







        </div>

</div>








@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
{{--    <link rel="stylesheet" href="{{asset('css/userpanel/tags/tagselector.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/userpanel/step1.css')}}">--}}
        <script src="{{ asset('js/userpanel/tags/tagselector.js') }}" ></script>
    <script src="{{asset('js/parsley/parsley.js')}}"></script>
    <script>
        $('#step1').parsley();
    </script>

@endpush

