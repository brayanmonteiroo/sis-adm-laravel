<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sis Adm Laravel</title>

    </head>
    <body>

        <h1>Seja bem-vindo ao Sis Adm Laravel</h1>

        <p>
            Data atual: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }};
        </p>

    </body>
</html>
