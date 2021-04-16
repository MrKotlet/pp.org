<div>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Nazwa</th>

            <th scope="col">data i miejsce</th>
            <th scope="col">Opcje</th>
            <th scope="col">B2B?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td>{{$event->name}}</td>

                <td>{{$event->showDate()}}, {{$event->location}}</td>
                <td>
                    @if($event->visible)
                        <a href="/toggle/{{$event->id}}/e">
                            <button class="btn-lg btn-danger">ukryj</button>
                        </a>
                    @else
                        @if($event->photos->count()>=3)
                            <a href="/toggle/{{$event->id}}/e">
                                <button class="btn-lg btn-success">opublikuj</button>
                            </a>
                        @endif
                    @endif
                    @if($event->name != 'testB2B')
                        <a href="/editEvent/{{$event->id}}">
                            <button class="btn-lg btn-warning">edytuj</button>
                        </a>
                        <a href="/event/{{$event->id}}" target="_blank">
                            <button class="btn-lg btn-warning">podejrzyj</button>
                        </a>
                        <a href="/event-photos/{{$event->id}}">
                            <button class="btn-lg btn-warning">photos</button>
                        </a>
                    @endif
                    @if($event->b2b)
                        <a href="/createB2B/{{$event->id}}">
                            <button class="btn-lg btn-danger">End B2B</button>
                        </a>
                    @else
                        <a href="/createB2B/{{$event->id}}">
                            <button class="btn-lg btn-primary">B2B</button>
                        </a>
                    @endif
                    <a href="/eventDelete/{{$event->id}}">
                        <button class="btn-lg btn-outline-danger">delete</button>
                    </a>

                </td>
                <td>
                    @if($event->b2b)
                        <p>yes</p>
                    @else
                        <p>no</p>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="row col-6">
        <a href="/addEvent">
            <button class="btn btn-success">Add Event</button>
        </a>
        <a href="/testB2B">
            <button class="btn btn-success">Create testB2B session</button>
        </a>
    </div>

</div>
