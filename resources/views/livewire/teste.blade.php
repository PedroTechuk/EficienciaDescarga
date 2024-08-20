<?php

use function Livewire\Volt\{state, layout, mount, rules, uses, updated};

use Mary\Traits\Toast;
use App\Models\Sala;
use App\Models\Reserva;

use Carbon\Carbon;

uses([Toast::class]);

state(['id'])->url();
state(['sala', 'salas' => [], 'unidade', 'unidades' => [], 'horarios_selecionados' => [], 'horarios' => []]);

mount(function () {
    if ($this->id) {
        $sala = Sala::firstWhere('id', $this->id);

        $this->sala = $sala->id;

        $this->unidade = $sala->unidade;

        $reservas = Reserva::where('sala_id', $this->id)->get();

        $todosHorarios = collect([['id' => '8', 'name' => '08:00 às 09:00'], ['id' => '9', 'name' => '09:00 às 10:00'], ['id' => '10', 'name' => '10:00 às 11:00'], ['id' => '11', 'name' => '11:00 às 12:00'], ['id' => '12', 'name' => '12:00 às 13:00'], ['id' => '13', 'name' => '13:00 às 14:00'], ['id' => '14', 'name' => '14:00 às 15:00'], ['id' => '15', 'name' => '15:00 às 16:00'], ['id' => '16', 'name' => '16:00 às 17:00'], ['id' => '17', 'name' => '17:00 às 18:00']]);

        $horariosOcupados = $reservas->map(function ($reserva) {
            return [
                'inicio' => Carbon::parse($reserva->hora_inicio)->format('H'),
                'fim' => Carbon::parse($reserva->hora_fim)->format('H'),
            ];
        });

        $horariosDisponiveis = $todosHorarios->filter(function ($horario) use ($horariosOcupados) {
            $hora = explode(':', $horario['name'])[0];
            return !$horariosOcupados->contains(function ($ocupado) use ($hora) {
                return $hora >= $ocupado['inicio'] && $hora < $ocupado['fim'];
            });
        });

        $this->horarios = $horariosDisponiveis->values()->toArray();
    }

    $this->unidades = [['id' => '1', 'name' => 'Virginia Maringá'], ['id' => '5', 'name' => 'Virginia Refrigerados'], ['id' => '3', 'name' => 'Virginia Guarapuava'], ['id' => '7', 'name' => 'Virginia Ponta Grossa'], ['id' => '10', 'name' => 'Norte Pioneiro'], ['id' => '4', 'name' => 'Virginia Varejo'], ['id' => '6', 'name' => 'Comercial de bebidas']];

    $this->horarios = $this->horarios = [['id' => '8', 'name' => '08:00 às 09:00'], ['id' => '9', 'name' => '09:00 às 10:00'], ['id' => '10', 'name' => '10:00 às 11:00'], ['id' => '11', 'name' => '11:00 às 12:00'], ['id' => '12', 'name' => '12:00 às 13:00'], ['id' => '13', 'name' => '13:00 às 14:00'], ['id' => '14', 'name' => '14:00 às 15:00'], ['id' => '15', 'name' => '15:00 às 16:00'], ['id' => '16', 'name' => '16:00 às 17:00'], ['id' => '17', 'name' => '17:00 às 18:00']];
});

$atualizaSalas = function ($unidade) {
    $this->salas = Sala::where('ativo', true)->where('unidade', $unidade)->get()->map(fn($e) => ['id' => $e->id, 'name' => $e->id . ' - ' . $e->nome_sala]);
};

$atualizaHorarios = function ($sala) {
    $reservas = Reserva::where('sala_id', $sala)->get();

    $todosHorarios = collect([['id' => '8', 'name' => '08:00 às 09:00'], ['id' => '9', 'name' => '09:00 às 10:00'], ['id' => '10', 'name' => '10:00 às 11:00'], ['id' => '11', 'name' => '11:00 às 12:00'], ['id' => '12', 'name' => '12:00 às 13:00'], ['id' => '13', 'name' => '13:00 às 14:00'], ['id' => '14', 'name' => '14:00 às 15:00'], ['id' => '15', 'name' => '15:00 às 16:00'], ['id' => '16', 'name' => '16:00 às 17:00'], ['id' => '17', 'name' => '17:00 às 18:00']]);

    $horariosOcupados = $reservas->map(function ($reserva) {
        return [
            'inicio' => Carbon::parse($reserva->hora_inicio)->format('H'),
            'fim' => Carbon::parse($reserva->hora_fim)->format('H'),
        ];
    });

    $horariosDisponiveis = $todosHorarios->filter(function ($horario) use ($horariosOcupados) {
        $hora = explode(':', $horario['name'])[0];
        return !$horariosOcupados->contains(function ($ocupado) use ($hora) {
            return $hora >= $ocupado['inicio'] && $hora < $ocupado['fim'];
        });
    });

    $this->horarios = $horariosDisponiveis->values()->toArray();
};

$reservar = function () {
    $data = $this->validate([
        'unidade' => ['required'],
        'sala' => ['required'],
        'horarios_selecionados' => ['required'],
    ]);

    ksort($data['horarios_selecionados']);

    foreach (array_filter($data['horarios_selecionados']) as $k => $horario) {
        $fim = $k + 1;

        try {
            Reserva::create([
                'sala_id' => $data['sala'],
                'reservado_por' => Auth::user()->name[0],
                'hora_inicio' => Carbon::today()->setHour($k),
                'hora_fim' => Carbon::today()->setHour($fim),
            ]);
        } catch (\Throwable $th) {
            return $this->error('Erro! Consulte o T.I');
        }
    }

    $this->reset(['sala', 'unidade', 'horarios_selecionados', 'id']);

    return $this->success('Reserva feita com sucesso!');
};

updated([
    'unidade' => $atualizaSalas,
    'sala' => $atualizaHorarios,
]);

layout('layouts.app');

?>

<div>
    <h1 class="font-bold text-2xl uppercase color">Reserva de Sala</h1><br />

    <form wire:submit.prevent="reservar">
        @if (!$this->id)
            <x-select label="Unidade:" icon="o-building-storefront" :options="$this->unidades" placeholder="Selecione uma unidade"
                placeholder-value="0" wire:model.live="unidade" required />

            @if ($this->unidade)
                <x-select label="Selecione uma sala" icon="o-user" :options="$this->salas"
                    placeholder="Selecione a sala que deseja reservar." placeholder-value="0" wire:model.live="sala" />
            @endif
        @endif

        @if ($this->sala)
            <div class="flex flex-col justify-center mt-2">
                <h1 class="text-center uppercase font-bold text-gray-900">HORÁRIOS DISPONÍVEIS</h1>
                <div class="grid md:grid-cols-5 gap-2 mt-2">
                    @forelse ($this->horarios as $horario)
                        <div
                            class="flex flex-row justify-center items-center shadow-md p-4 border border-gray-200 rounded">
                            <x-checkbox label="{{ $horario['name'] }}"
                                wire:model.live="horarios_selecionados.{{ $horario['id'] }}" right />
                        </div>
                    @empty
                        <p>Não há horários disponíveis.</p>
                    @endforelse
                </div>
            </div>
        @endif

        <x-button class="btn-sm btn-success w-full mt-2" label="RESERVAR SALA" type="submit" />
    </form>
</div>
