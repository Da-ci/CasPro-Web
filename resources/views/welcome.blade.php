<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de Test</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <hr>
    <br>
@foreach($users as $user)
    <div>{{ $user->name }}</div>
@endforeach
</body>
</html>
