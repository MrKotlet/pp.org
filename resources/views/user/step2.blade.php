@extends('home')

@section('usercontent')

    <div class="col-12 col-lg-10 step2-div">
        <br>
        <h3 class="">Company Profile Creator</h3>
        <h2 class=" display-4">Step 2: Show Your Company! </h2>
        <small>(You can edit it later)</small>
        <hr>


        <div class="step-all col-12 row">
            <div class="step2-face col-12 col-lg-5 g-0 ">

                <h3 class="some-space">Company Logo</h3>

                <x-userpanel.step2.profilepictures :company="$company" :logo="$logo" :main="$main"/>
                <hr>
                <h3 class="some-space">Company Name</h3>
                <x-userpanel.step2.namechanger :company="$company"/>


            </div>

            <div class="step2-desc col-12 col-lg-6 g-0">
                @if($company->opis =='')
                    <h3 class="some-space">Tell us something about Your Company</h3>
                @else
                    <h3 class="some-space">About Company</h3>
                @endif
                <hr>
                <x-userpanel.step2.descriptionchanger :company="$company"/>

            </div>

        </div>

        <hr>
        <h3 class="some-space">Tags:</h3>
        <x-userpanel.step2.tagchanger :company="$company" :tags="$tags"/>
        <hr>


        <h3 class="some-space">Gallery</h3>
        <div class="row justify-content-around">
            @if($others->count() < 6)
                <x-userpanel.step2.photocard :company="$company" :type="'add'" :photo="0"/>
            @endif

            @if($main)
                <x-userpanel.step2.photocard :company="$company" :type="'main'" :photo="$main"/>
            @endif

            @if($others)
                @foreach($others as $photo)
                    <x-userpanel.step2.photocard :company="$company" :type="'other'" :photo="$photo"/>
                @endforeach
            @endif


        </div>

    </div>














    @push('scripts')


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="{{ asset('js/userpanel/tags/tagselector.js') }}"></script>

        <script src="{{ asset('js/userpanel/step2/profilepictures.js') }}"></script>

        <script src="{{ asset('js/userpanel/step2/namechanger.js') }}"></script>

        <script src="{{ asset('js/userpanel/step2/tagchanger.js') }}"></script>

        <script src="{{ asset('js/userpanel/step2/photocard.js') }}"></script>
        <script src="{{ asset('js/userpanel/modal.js') }}"></script>


        <script src="{{asset('js/parsley/parsley.js')}}"></script>
        <script>

    $('#step1, #name-changer, #description-changer').parsley();



            let flag1 = false;
            let flag2 = false;

            const form1 = document.getElementById('form1');
            const form2 = document.getElementById('form2');

            const btn1 = document.querySelector('#form1 .btn');
            const btn2 = document.querySelector('#form2 .btn');

            function ValidateSize(file, id) {
                var FileSize = file.files[0].size; // in MiB
                let fileType = file.files[0].type;
                const maxSize = 5242880;
                const extensions = ["image/svg+xml", "image/jpeg", "image/png"];
                let formId = id;
                console.log(FileSize)
                if (extensions.includes(fileType) && FileSize < maxSize) {
                    console.log("jest git")
                 if(flag1 || flag2){


                     btn2.classList.remove('disabled');
                     btn2.disabled = false;
                     btn1.classList.remove('disabled');
                     btn1.disabled = false;
                     p = document.querySelector('.error');
                     p.remove();

                 }


                } else {
                    let p
                    if (formId === 1) {

                        if (flag1) {
                            p = document.querySelector('.error');


                        } else {
                            p = document.createElement('p');
                            p.style.color = "red";
                        }
                    } else {
                        if (flag2) {
                            p = document.querySelector('.error');


                        } else {
                            p = document.createElement('p');
                            p.style.color = "red";
                        }
                    }


                    p.classList.add('error')
                    if (extensions.includes(fileType)) {
                        p.textContent = "file is to big"
                    } else {
                        p.textContent = "file type not supported"
                    }

                    if (formId === 1) {
                        flag1 = true;
                        btn1.classList.add('disabled');
                        btn1.disabled = true
                        form1.appendChild(p);
                    } else {
                        flag2 = true;
                        btn2.classList.add('disabled');
                        btn2.disabled = true
                        form2.appendChild(p);
                    }


                    $(file).val('');
                }
            }


        </script>
        <script>

            $('.f-div2 button').click(e => {
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
                        $('.f-div .row').append(
                            `<div class="tag-div m-1">
                                <div class="tag-i tag-active">
                                            <p for="tags[]" class="my-auto">${res.tag.name}</p>

                                            <i class="fas fa-check-circle"></i>
                                </div>

                                <input type="checkbox" class="form-control" name="tags[]" value="${res.tag.id}" checked="checked">

                         </div>`
                        );

                    }

                })


            })
        </script>
        <script src="{{ asset('js/userpanel/step2/descriptionchanger.js') }}"></script>
    @endpush





@endsection
