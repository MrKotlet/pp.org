@extends('layouts.app')

@section('content')
        <br>
    <div class="card container mx-auto">
        <div class="card-header">
            Meeting offer sent!
        </div>
        <div class="card-body">
            <h5 class="card-title">Please wait for company response</h5>
            <p class="card-text">We will inform you about meeting status via mail and on your user panel.</p>
            <a href="/company/{{$meeting->company_id}}" class="btn btn-primary">Back</a>
        </div>
    </div>

@endsection
