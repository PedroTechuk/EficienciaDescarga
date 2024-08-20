<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <label for="placa" class="form-label">Selecionar Placa</label><br>
        <select name="placa" id="placa" class="form-select" required>
            <option value="">Selecione</option>
            @forelse($placas as $placa)
                <option value="{{ $placa->id }}">{{ $placa->placa }}</option>
            @empty
                <option value="">Nenhuma placa encontrada</option>
            @endforelse
        </select><br><br>



        <button wire:click.prevent="capturarInicio">Iniciar</button> <br><br>

        <button wire:click.prevent="capturarFinal">Finalizar</button>

    </div>
</body>
</html>



