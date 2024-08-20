<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Descarga;
use App\Models\Placa;

class Descarte extends Component
{
    // Placa obrigatória


    // Capturar inicio e fim da mensuração
    public $inicio;
    public $final;
    public function capturarInicio()
    {
        $this->inicio = Carbon::now()->format('d/m/y H:i');
    }
    public function capturarFinal()
    {
        $this->final = Carbon::now()->format('d/m/y H:i');
    }

    // Renderizar a view
    public function render()
    {
        $placas = Placa::orderBy('placa')->get();

        return view('livewire.descarte',[
            'placas' => $placas,
        ]);
    }
}
