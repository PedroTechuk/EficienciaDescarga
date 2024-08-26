<?php

namespace App\Livewire;

use App\Models\Descarga;
use App\Models\Placa;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Component
{
    public $placas;
    public $descargas;

    public function mount()
    {
        $this->placas = Placa::all();
        $this->descargas = Descarga::with('placa')->orderBy('data', 'desc')->orderBy('hora_inicio', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.relatorio');
    }
}
