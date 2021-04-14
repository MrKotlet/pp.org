<div class="note-div">
    <div class="meet-note">
    <h4 >New meeting proposal from {{$note->meeting->user->name}}!</h4>
    <p class="meet-info">Date: {{$note->meeting->hour->date->showDate()}},
        Time: {{$note->meeting->hour->showHour()}}</p>


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
    </div>
    @if($note->message)
        <div class="meet-message">
            <h2>Message from {{$note->meeting->user->name}} </h2>
            <hr>
            <p>{{$note->message}}</p>
        </div>
    @endif
    @if($note->age == 'new')
        <div class="new"><p>new!</p></div>
    @endif

</div>
<hr>
