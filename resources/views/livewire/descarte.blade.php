<div>
    <form method="post" wire:submit.prevent="create">

        <label for="placa" class="form-label">Selecionar Placa</label><br>

        <select name="placa" id="placa" class="form-select" wire:model="placa" required>
            <option value="">Selecione</option>
            @forelse($placas as $placa)
                <option value="{{ $placa->id }}">{{ $placa->placa }}</option>
            @empty
                <option value="">Nenhuma placa encontrada</option>
            @endforelse
        </select><br><br>

        <button wire:click.prevent="captureStart">Iniciar</button>
        <br><br>

        <button type="submit">Finalizar</button>
    </form>
    <hr>

    @foreach($descargas as $descarga)
        {{ $descarga->placa_id }} - {{ $descarga->hora_inicio }} - {{ $descarga->hora_fim }} - {{ $descarga->data }}
        <hr>
    @endforeach

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
