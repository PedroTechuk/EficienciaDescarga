<?php

namespace App\Http\Controllers;

use App\Models\Descarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DescargaController extends Controller
{
    public function exportCsv()
    {
        $descargas = Descarga::all();

        $csvContent = "Placa,Inicio Descarga,Fim Descarga,Data\n";

        foreach ($descargas as $descarga) {
            $csvContent .= "{$descarga->placa?->placa},{$descarga->hora_inicio},{$descarga->hora_fim}," . \Carbon\Carbon::parse($descarga->data)->format('d/m/Y') . "\n";
        }

        $fileName = 'relatorio_descargas_' . date('Ymd_His') . '.csv';

        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }
}
