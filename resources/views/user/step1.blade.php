@extends('home')

@section('usercontent')

    <div class="col-12 col-lg-8 g-0 step1-div">


        <div class="card-body">
            <h3 class="">Company Profile Creator</h3>
            <h2 class="">Step 1: Company Info</h2>
            <div class="">
                <form action="{{ action ('HomeController@store')}}" method="POST" role="form" id="step1"
                      data-parsley-validate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Company Name</label>
                        <input type="text" placeholder="company name" class="form-control" id="name" name="name"
                               required data-parsley-type="alphanum">
                    </div>

                    <div class="form-group mb-2">
                        <label for="homepage">Official homepage address</label>
                        <input type="url" placeholder="homepage url" class="form-control" id="homepage" name="homepage"
                               required>
                    </div>

                    <p>What does your company do?</p>
                    <div class="input-group mb-2">

                        @foreach($tags as $tag)
                            <x-userpanel.tags.tagselector :tag="$tag" :company="0"/>
                        @endforeach
                    </div>
                    <br>

                    <button type="submit" class="btn btn-success">Save and move to step 2</button>
                </form>
                <a class="modal-toggle" data-modal="#ex8">There's not tag fitting your company? add it here</a>


            </div>


        </div>

    </div>
    {{--modal--}}


    <div id="ex8" class="my-modal">
        <div class="wrapper">

            <div>

                <h4>Add Tag name</h4>
                <small>(max 3)</small>


            </div>

            <div class="f-div">
                <input type="text" id="add-tag">
                <button>add tag</button>


            </div>
            <div class="modal-close"><i class="fas fa-times"></i></div>

        </div>
    </div>







@endsection
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{--    <link rel="stylesheet" href="{{asset('css/userpanel/tags/tagselector.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/userpanel/step1.css')}}">--}}
    <script src="{{ asset('js/userpanel/tags/tagselector.js') }}"></script>
    <script src="{{ asset('js/userpanel/modal.js') }}"></script>
    <script src="{{asset('js/parsley/parsley.js')}}"></script>
    <script>
        $('#step1').parsley();
        $('.f-div button').click(e => {
            e.preventDefault();

            $id = $('#add-tag').val();

            $.ajax({

                url: '{{url('/step1tag')}}',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tagName": $id,


                },
                dataType: "json",
                success: function (res) {
                    console.log('działa')
                    $('.input-group').append(
                        `<div class="tag-div m-1">
                                <div class="tag-i tag-active">
                                            <p for="tags[]" class="my-auto">${res.tag.name}</p>

                                            <i class="fas fa-check-circle"></i>
                                </div>

                                <input type="checkbox" class="form-control" name="tags[]" value="${res.tag.id}" checked="checked">

                         </div>`
                    );
                    $('#ex8, #overlay-back').fadeOut();
                }

            })


        })
    </script>

@endpush

