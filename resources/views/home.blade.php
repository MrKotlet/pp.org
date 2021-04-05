@extends('layouts.app')

@section('content')


    <div class="row mx-auto">

        <x-userpanel.homenav :company="$company" :user="$user"/>

       @yield('usercontent')

   </div>
@endsection
