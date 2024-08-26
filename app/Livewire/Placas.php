<?php

namespace App\Livewire;

use App\Models\Descarga;
use App\Models\Placa;
use Livewire\Component;

class Placas extends Component
{
    public $placas;
    public $descargas;

    public function mount()
    {
        $this->placas = Placa::all();
        $this->descargas = Descarga::all();
    }

    public function render()
    {
        return view('livewire.placas');
    }
}
