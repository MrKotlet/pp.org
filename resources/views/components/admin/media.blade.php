<div>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Nazwa</th>
            <th>stream</th>
            <th scope="col">data</th>
            <th scope="col">Opcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($streams as $stream)
            <tr>
                <th scope="row">{{$stream->id}}</th>
                <td>{{$stream->name}}</td>
                <td>{{$stream->event->name}}</td>
                <td>{{$stream->date}}</td>
                <td>
                    <a href="/verifystream/{{$stream->id}}">
                        <button class="btn-lg btn-warning">edytuj</button>
                    </a>
                    <a href="/media/{{$stream->id}}" target="_blank">
                        <button class="btn-lg btn-warning">podejrzyj</button>
                    </a>
                    <a href="/admin/streamDelete/{{$stream->id}}">
                        <button class="btn-lg btn-warning">usuń</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
