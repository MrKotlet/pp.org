<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<style>
    html{
        font-family: "Helvetica Neue Light", "HelveticaNeue-Light", "Helvetica Neue", Calibri, Helvetica, Arial, sans-serif;
    }
    body{
        width: 70%;
        margin: 0 auto;
    }
    div{

        text-align: center;
        margin: 0 auto;
    }
    h1{
        color: #cd2222;
        font-size: 3rem;
    }
    h3{
        font-size: 1rem;
    }
    hr{
        border-color: red;
    }
    .name{
        font-size: 2rem;
    }
    .date{
        font-size: 24px;
    }
    .info{
        border: 1px solid lightcoral;

        width: 60%;
    }


</style>

<body>

<div>
    <h1>Polish Fashion</h1>
</div>

<div>
    <h3>{{$cname}} zaakceptował twoją propozycję spotkania!</h3>
    <hr>
    <br>
    <div class="info">

        <p class="name">{{$meet->company->name}}</p>
        <p class="date">Data: {{$meet->date}}, godzina: {{$meet->hours}}</p>


    </div>
    <h3>Spotkanie będzie dostępne w panelu użytkownika <a href="polishfashion.org">polishfashion.org</a>, w zakładce spotkania B2B</h3>
</div>



</body>
</html>
