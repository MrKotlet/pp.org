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
        @foreach($roles as $role)
            <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
                <td>{{$role->users->count()}}</td>
                <td>
                    <a href="/admin/roleDelete/{{$role->id}}">
                        <button class="btn-lg btn-warning">usuń</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <br>
    <form action="/admin/addRole" class="form" method="POST">
        @csrf
        <label for="inputPassword5" class="form-label">Nowa rola</label>
        <input type="text" class="form-control" aria-describedby="passwordHelpBlock" name="name">
        <button class="btn-lg btn-success">Dodaj</button>
    </form>
    <form action="/admin/giveRole" class="form" method="POST">
        @csrf
        <label for="inputPassword5" class="form-label">Nadaj rolę</label>
        <input type="text" class="form-control" aria-describedby="passwordHelpBlock" name="user">
        <select class="form-select" aria-label="Default select example" name="role">
            <option selected>Wybierz role</option>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        <button class="btn-lg btn-success">Nadaj Rolę</button>
    </form>
</div>
