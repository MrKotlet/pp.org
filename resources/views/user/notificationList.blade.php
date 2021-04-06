@extends('home')

@section('usercontent')


    @if($notes->isEmpty())

        <h3>You don't have any notifications</h3>
    @else

        <div class="col-12 col-lg-10 notes-div">
            <h2>Notifications</h2>
            <hr>
            @foreach($notes as $note)
                @if($note->subject == "meetprop")
                    <x-notes.meet-prop :note="$note"/>
                @elseif($note->subject == "meetok" || $note->subject == "meetnope")
                    <x-notes.meet-answer :note="$note"/>
                @endif
            @endforeach

        </div>





    @endif




@endsection

@push('scripts')
{{--    <link rel="stylesheet" href="{{asset('css/userpanel/notesList.css')}}">--}}

@endpush
