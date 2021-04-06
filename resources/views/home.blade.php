@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('sass/user.css')}}">
@endpush
@section('content')


    <div class="row mx-auto">

        <x-userpanel.homenav :company="$company" :user="$user"/>

       @yield('usercontent')

   </div>
@endsection
