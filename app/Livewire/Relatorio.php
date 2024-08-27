<?php

namespace App\Livewire;

use App\Models\Descarga;
use App\Models\Placa;
use Livewire\Component;
use Mary\Traits\Toast;

class Relatorio extends Component
{
    use Toast;


    public $placas;
    public $descargas;

    //Soft delete
    public function delete($id)
    {
        $descargas = Descarga::find($id);

        if ($descargas) {
            $descargas->delete(); // Soft delete
            $this->descargas = Descarga::orderBy('created_at', 'desc')->get();
            $this->success('Descarga removida com sucesso!');
        }
    }

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
