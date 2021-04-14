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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/userpanel/tags/tagselector.css')}}">
    <script src="{{ asset('js/userpanel/tags/tagselector.js') }}" ></script>

@endpush
