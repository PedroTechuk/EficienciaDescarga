<?php

namespace App\Livewire;

use App\Models\Descarga;
use App\Models\Placa;
use Illuminate\Support\Facades\Response;
use Livewire\Component;
use Mary\Traits\Toast;

class Relatorio extends Component
{
    use Toast;


    public $placas;
    public $descargas;

    //Gerar CSV
    public function exportCsv()
    {
        $descargas = Descarga::all();

        $csvContent = "Placa,Início Descarga,Fim Descarga,Data";

        foreach ($descargas as $descarga) {
            $csvContent .= "{$descarga->placa?->placa},{$descarga->hora_inicio},{$descarga->hora_fim}," . \Carbon\Carbon::parse($descarga->data)->format('d/m/Y');
        }

        $fileName = 'relatorio_descargas_' . date('Ymd_His') . '.csv';

        return response($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }


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
