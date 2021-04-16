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
                    @if($stream->visible)
                        <a href="/toggle/{{$stream->id}}/s">
                            <button class="btn-lg btn-danger">ukryj</button>
                        </a>
                    @else
                        @if($stream->photo)
                            <a href="/toggle/{{$stream->id}}/s">
                                <button class="btn-lg btn-success">opublikuj</button>
                            </a>
                        @endif
                    @endif
                    <a href="/editStream/{{$stream->id}}">
                        <button class="btn-lg btn-warning">edytuj</button>
                    </a>
                    <a href="/media/{{$stream->id}}" target="_blank">
                        <button class="btn-lg btn-warning">podejrzyj</button>
                    </a>
                    <a href="/streamDelete/{{$stream->id}}">
                        <button class="btn-lg btn-outline-danger">usuń</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <a href="/newStream">
        <button class="btn btn-success">Add Stream</button>
    </a>
</div>
