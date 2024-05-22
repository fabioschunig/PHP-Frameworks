<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Séries</title>
</head>

<body>
    <h1>Séries</h1>

    <ul>
        @foreach ($series as $serie)
        <li>{{$serie}}</li>
        @endforeach
    </ul>
</body>

</html>