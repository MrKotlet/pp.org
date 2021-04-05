<div class="note-div">

    @if($note->subject=='meetok')
        <h3> {{$note->meeting->company->name}} accepted your meeting offer- Date: {{$note->meeting->date}},
            Time: {{$note->meeting->hours}}</h3>
    @else
        <h3> {{$note->meeting->company->name}} declined your meeting offer- Date: {{$note->meeting->date}},
            Time: {{$note->meeting->hours}}</h3>
    @endif

    <div><a href="/notedelete/{{$note->id}}">X</a> </div>

    @if($note->age == 'new')
        <div class="new"><p>new!</p></div>
    @endif
    <hr>
</div>
