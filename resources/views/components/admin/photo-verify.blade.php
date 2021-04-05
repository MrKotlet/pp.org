<div>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">podgląd</th>
            <th scope="col">typ</th>
            <th scope="col">Firma</th>
            <th scope="col">Opcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <th scope="row">{{$photo->id}}</th>
                <td><img src="{{asset ('companies/'.$photo->company->id.'/'.$photo['name'])}}" class="img-thumbnail "
                         id="{{$photo->id}}" alt="..."></td>
                <td>{{$photo->type}}</td>
                <td><a href="/company/{{$photo->company->id}}">{{$photo->company->name}}</a></td>
                <td>
                    <a href="/verifyPhoto/{{$photo->id}}">
                        <button class="btn-lg btn-warning">zweryfikuj</button>
                    </a>

                    <a href="/admin/photoDelete/{{$photo->id}}">
                        <button class="btn-lg btn-warning">usuń</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <style>
        td:nth-child(2) {
            width: 400px;
        }

        td img {
            width: 100%
        }
    </style>
</div>
