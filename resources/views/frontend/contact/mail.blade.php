<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Missatge del formulari web</title>
    </head>
    <body>
        <h3>Missatge: </h3>
        <p>
            <strong>Nom i cognoms:</strong> {{ $data['name'] }}<br>
            <strong>Correu electrònic:</strong> {{ $data['mail'] }}<br>
            <strong>Missatge:</strong> {{ $data['msg'] }}<br>
        </p>
    </body>
</html>