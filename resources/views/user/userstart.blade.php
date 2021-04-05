@extends('home')

@section('usercontent')

    <div  class="col-12 col-lg-10 g-0 "  >

          <x-userpanel.userstart.userstartc :company="$company" :photo="$photo" :user="$user" :notes="$notes"/>


    </div>








@endsection
