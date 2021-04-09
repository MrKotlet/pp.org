@extends('home')

@section('usercontent')

    <div class="col-12 col-lg-10 notes-div">
        <h3 class="p-4 display-2">Notifications</h3>
        <hr>


        @if($notes->isEmpty())
            <div class="p-4">
                <h3>You don't have any notifications</h3>
            </div>
        @else



            @foreach($notes as $note)
                @if($note->subject == "meetprop")
                    <x-notes.meet-prop :note="$note"/>
                @elseif($note->subject == "meetok" || $note->subject == "meetnope")
                    <x-notes.meet-answer :note="$note"/>
                @endif
            @endforeach







        @endif

    </div>


@endsection

@push('scripts')


@endpush
