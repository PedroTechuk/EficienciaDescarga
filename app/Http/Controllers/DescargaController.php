<?php

namespace App\Http\Controllers;

use App\Models\Descarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DescargaController extends Controller
{
    public function exportCsv(Request $request)
    {
        // Inicialize a query para Descarga
        $query = Descarga::query();

        // Aplique os filtros de ano, mês e dia, se fornecidos
        if ($request->filled('year')) {
            $query->whereYear('data', $request->year);
        }

        if ($request->filled('month')) {
            $query->whereMonth('data', $request->month);
        }

        if ($request->filled('day')) {
            $query->whereDay('data', $request->day);
        }

        // Obtenha os dados filtrados
        $descargas = $query->get();

        // Criação do conteúdo do CSV
        $csvContent = "Placa,Inicio Descarga,Fim Descarga,Data\n";

        foreach ($descargas as $descarga) {
            $csvContent .= "{$descarga->placa?->placa},{$descarga->hora_inicio},{$descarga->hora_fim}," . \Carbon\Carbon::parse($descarga->data)->format('d/m/Y') . "\n";
        }

        // Defina o nome do arquivo CSV
        $fileName = 'relatorio_descargas_' . date('Ymd_His') . '.csv';

        // Retorne o CSV como download
        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }
}
