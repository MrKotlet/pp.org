<div>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Nazwa</th>
            <th scope="col">strona główna</th>
            <th scope="col">liczba zdjęć do zweryfikowania</th>
            <th scope="col">Opcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <th scope="row">{{$company->id}}</th>
                <td>{{$company->name}}</td>
                <td>{{$company->homepage}}</td>
                <td>{{$company->photos->where('verified',0)->count()}}</td>
                <td>
                    <a href="/verifyCompany/{{$company->id}}">
                        <button class="btn-lg btn-warning">zweryfikuj</button>
                    </a>
                    <a href="/company/{{$company->id}}" target="_blank">
                        <button class="btn-lg btn-warning">podejrzyj</button>
                    </a>
                    <a href="/admin/companyDelete/{{$company->id}}">
                        <button class="btn-lg btn-warning">usuń</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
