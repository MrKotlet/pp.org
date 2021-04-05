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

        width: 40%;
    }


</style>

<body>
{{--        <h1>{{$title ?? ''}}</h1>--}}

{{--        <p>{{$content ?? ''}}</p>--}}
<div>
    <h1>Polish Fashion</h1>
</div>

<div>
    <h3>Ktoś wysłał ci propozycję Spotkania na naszej platformie!</h3>
    <hr>
    <br>
    <div class="info">

       <p class="name">Jan Kowalski</p>
        <p class="date">Data: 12.12.2021, godzina: 11:00</p>


    </div>
    <h3>Odpowiedz na propozycje logując się na <a href="polishfashion.org">polishfashion.org</a> w zakładce powiadomienia</h3>
</div>



</body>
</html>
