@extends('layouts.admin')

@section('admin')
    <div class="col-10">
        <p class="display-3">New Event</p>
        <form action="createEvent" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event Description</label>
                <textarea class="form-control" name="opis"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event official page</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="homepage" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Event location</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="location">
            </div>
            <div class="row">
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">Year</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="year">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">Start month</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="startMonth">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">Start day</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="startDay">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">End month</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="endMonth">
                </div>
                <div class="mb-3 col-2">
                    <label for="exampleInputEmail1" class="form-label">End day</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="endDay">
                </div>

            </div>


            <button type="submit" class="btn btn-warning">save</button>
        </form>


    </div>



@endsection
