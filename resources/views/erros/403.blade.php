<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Compras - Erro 404</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            color: #333;
        }

        h1 {
            font-size: 3em;
            color: #104c97;
        }

        p {
            font-size: 1.5em;
            color: #718096;
        }

        img {
            max-width: 20%;
            height: auto;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>

<body>
    <div>
        <h1>Ops! Parece que você se perdeu.</h1>
        <p>Parece que você encontrou um lugar onde não deveria estar. Mas não se preocupe, nós entendemos, às vezes os
            caminhos são confusos.</p>
        <img src="{{ Vite::asset('resources/img/logo.png') }}">
    </div>
</body>

</html>
