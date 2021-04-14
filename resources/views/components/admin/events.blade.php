<div>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Nazwa</th>

            <th scope="col">data i miejsce</th>
            <th scope="col">Opcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td>{{$event->name}}</td>

                <td>{{$event->showDate()}}, {{$event->location}}</td>
                <td>
                    <a href="/editEvent/{{$event->id}}">
                        <button class="btn-lg btn-warning">edytuj</button>
                    </a>
                    <a href="/event/{{$event->id}}" target="_blank">
                        <button class="btn-lg btn-warning">podejrzyj</button>
                    </a>
                    <a href="/event-photos/{{$event->id}}">
                        <button class="btn-lg btn-warning">photos</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <a href="/addEvent"><button class="btn btn-success">Add Event</button></a>
</div>
