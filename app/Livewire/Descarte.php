<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Descarga;
use App\Models\Placa;
use function Symfony\Component\Translation\t;

class Descarte extends Component
{
    public $unidade = 0;
    public $placa;
    public $data;
    public $start;
    public $end;

    public $placas;
    public $descargas;

    // Carregar os dados ao iniciar o componente
    public function mount()
    {
        $this->placas = Placa::all();
        $this->descargas = Descarga::all();
    }

    // Capturar o horário de início
    public function captureStart()
    {
        $this->start = Carbon::now()->format('H:i:s');
        session()->flash('message', 'Início capturado às ' . $this->start);
    }

    // Finalizar e criar o registro
    public function create()
    {
        $this->end = Carbon::now()->format('H:i:s');
        $this->data = Carbon::now()->format('Y-m-d');

        Descarga::create([
            'unidade' => $this->unidade,
            'placa_id' => $this->placa,
            'hora_inicio' => $this->start,
            'hora_fim' => $this->end,
            'data' => $this->data,
        ]);

        // Atualizar a lista de descargas
        $this->descargas = Descarga::all();

        session()->flash('message', 'Registro criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.descarte');
    }
}
