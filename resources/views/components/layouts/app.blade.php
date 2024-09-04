<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ 'Eficiência de Descarga' }}</title>
        <link rel="icon" type="image/png" href="{{ asset('img/LogoTitulo1.png') }}">
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
