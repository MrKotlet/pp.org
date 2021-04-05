<div>


    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Nazwa</th>
            <th scope="col">liczba użyć</th>
            <th scope="col">Edycja</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->name}}</td>
                <td>{{$tag->companies->count()}}</td>
                <td>
                    <a href="/admin/tagDelete/{{$tag->id}}">
                        <button class="btn-lg btn-warning">usuń</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <br>
    <form action="/admin/addTag" class="form" method="POST">
        @csrf
        <label for="inputPassword5" class="form-label">Nowy tag</label>
        <input type="text" class="form-control" aria-describedby="passwordHelpBlock" name="name">
        <button class="btn-lg btn-success">Dodaj</button>
    </form>


</div>
