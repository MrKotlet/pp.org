<div class="note-div">
    <div class="meet-note meet-answer">


    @if($note->subject=='meetok')
            <h4 >{{$note->meeting->user->name}} accepted your meeting offer!</h4>
            <p class="meet-info">Date: {{$note->meeting->hour->date->showDate()}},
                Time: {{$note->meeting->hour->showHour()}}</p>

    @else
            <h4 >{{$note->meeting->user->name}} declined your meeting offer.</h4>
            <p class="meet-info">Date: {{$note->meeting->hour->date->showDate()}},
                Time: {{$note->meeting->hour->showHour()}}</p>

    @endif

    <div><a href="/notedelete/{{$note->id}}" class="note-delete">X</a> </div>
    </div>
    @if($note->age == 'new')
        <div class="new"><p>new!</p></div>
    @endif

</div>
    <hr>
