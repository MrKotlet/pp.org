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

                <td>{{$event->date}},{{$event->location}}</td>
                <td>
                    <a href="/verifyevent/{{$event->id}}">
                        <button class="btn-lg btn-warning">edytuj</button>
                    </a>
                    <a href="/event/{{$event->id}}" target="_blank">
                        <button class="btn-lg btn-warning">podejrzyj</button>
                    </a>
                    <a href="/admin/eventDelete/{{$event->id}}">
                        <button class="btn-lg btn-warning">usuń</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
