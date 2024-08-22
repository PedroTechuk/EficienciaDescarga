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

    protected $rules = [
        'placa' => 'required',
        'start' => 'required',
    ];

    public function mount()
    {
        $this->placas = Placa::all();
        $this->descargas = Descarga::all();
    }

    // Atualizar a variável $placaSelecionada quando $placa mudar
    public function updatedPlaca($value)
    {
        $this->placaSelecionada = Placa::find($value);
    }

    public function captureStart()
    {
        $this->validateOnly('placa');
        $this->start = Carbon::now()->format('H:i:s');
        session()->flash('message', 'Início capturado às ' . $this->start);
    }

    public function create()
    {
        $this->validate();

        $this->end = Carbon::now()->format('H:i:s');
        $this->data = Carbon::now()->format('Y-m-d');

        Descarga::create([
            'unidade' => $this->unidade,
            'placa_id' => $this->placa,
            'hora_inicio' => $this->start,
            'hora_fim' => $this->end,
            'data' => $this->data,
        ]);

        // Limpar os valores após a criação do registro
        $this->placa = '';
        $this->start = '';
        $this->end = '';
        $this->placaSelecionada = null; // Resetar a placa selecionada

        // Atualizar a lista de descargas
        $this->descargas = Descarga::all();

        session()->flash('message', 'Registro criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.descarte');
    }
}


