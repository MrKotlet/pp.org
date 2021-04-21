<div>


    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Name (click to edit)</th>
            <th scope="col">liczba użyć</th>
            <th scope="col">Edycja</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr class="tr-tag">
                <th scope="row">{{$tag->id}}</th>
                <td class="name">{{$tag->name}}</td>
                <td class="name-input d-none"><input type="text" value="{{$tag->name}}" data-id="{{$tag->id}}">
                    <button class=" btn btn-primary save">save</button>
                </td>

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
