@extends('layouts.admin')

@section('admin')
    @switch($type)
        @case(1)
        <x-admin.dashboard/>
        @break

        @case(2)
        <x-admin.roles :roles="$roles"/>
        @break

        @case(3)
        <x-admin.company-verify :companies="$companies"/>
        @break

        @case(4)
        <x-admin.photo-verify :photos="$photos"/>
        @break

        @case(5)
        <x-admin.company-search :companies="$companies" :tags="$tags"/>
        @break

        @case(6)
        <x-admin.tags :tags="$tags"/>
        @break

        @case(7)
        <x-admin.events :events="$events"/>
        @break

        @case(8)
        <x-admin.media :streams="$streams"/>
        @break

        @case(9)
        <x-admin.options/>
        @break
    @endswitch

@endsection


@push('adminScripts')

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/userpanel/tags/tagselector.css')}}">
    <script src="{{ asset('js/userpanel/tags/tagselector.js') }}"></script>
    <script>

        const trs = document.querySelectorAll('.tr-tag');

        function changeView() {
            const parent = this.parentNode;

            this.classList.toggle('d-none');
            parent.querySelector('.name-input').classList.toggle('d-none');

        }

        function saveName(e) {
            e.preventDefault();
            const parent = this.parentNode;
            const input = parent.querySelector('input');
            const tag = parent.parentNode.querySelector('.name');

            console.log(tag);
            const id = input.dataset.id;


            const newName = input.value;

            $.ajax({

                url: '{{url('/admin-tag')}}',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tagName": newName,
                    "id": id

                },
                dataType: "json",
                success: function (res) {
                    console.log('działa');
                    tag.textContent = res.tagName;


                }

            })
            const inputs = document.querySelectorAll('.name-input');
            const names = document.querySelectorAll('.name');

            inputs.forEach(input =>{
                input.classList.add('d-none');

            })
            names.forEach(name =>{
                name.classList.remove('d-none');
            })
        }

        trs.forEach(tr => {
            const tag = tr.querySelector('.name');

            const saveButton = tr.querySelector('.save');


            tag.addEventListener('click', changeView);


            saveButton.addEventListener('click', saveName);
        })


    </script>

@endpush
