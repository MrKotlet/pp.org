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
                    <a href="/admin/compcreator2/{{$company->id}}">
                        <button class="btn-lg btn-success">Step 2</button>
                    </a>
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

    <form action="{{ action ('HomeController@store')}}" method="POST" role="form">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Company Name</label>
            <input type="text" placeholder="podaj nazwę firmy" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group mb-2">
            <label for="homepage">Official homepage address</label>
            <input type="text" placeholder="adres strony" class="form-control" id="homepage" name="homepage" required>
        </div>

        <p>What does your company do?</p>
        <div class="input-group mb-2">

            @foreach($tags as $tag)
                <x-userpanel.tags.tagselector :tag="$tag" :company="0"/>
            @endforeach
        </div>
        <br>
        <button type="submit" class="btn btn-success" >Save and move to step 2</button>
    </form>
</div>
