<div class="note-div">
    <h3>New meeting proposal from {{$note->meeting->user->name}} - Date: {{$note->meeting->date}},
        Time: {{$note->meeting->hours}}</h3>

    @if($note->message)
        <br>
        <h4>Message</h4>
        <p>{{$note->message}}</p>
    @endif
    <br>
    @if($note->meeting->status == 'accepted')
        <div>
            <p>The meeting was accepted</p>
            <a href="/meetnope/{{$note->meeting->id}}">
                <button class="btn-lg btn-danger">Cancel</button>
            </a>
        </div>


    @else
        <div>
            <a href="/meetok/{{$note->meeting->id}}">
                <button class="btn-lg btn-primary">Accept</button>
            </a>
            <a href="/meetnope/{{$note->meeting->id}}">
                <button class="btn-lg btn-danger">Refuse</button>
            </a>
        </div>
    @endif

    @if($note->age == 'new')
        <div class="new"><p>new!</p></div>
    @endif
    <hr>
</div>
