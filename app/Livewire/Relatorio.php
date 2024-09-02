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

    public $selectedMonth;  // Propriedade para o mês selecionado
    public $selectedDays;   // Propriedade para os dias selecionados

    public function mount()
    {
        \Carbon\Carbon::setLocale('pt_BR');
        $this->placas = Placa::all();
        $this->descargas = Descarga::with('placa')
            ->orderBy('data', 'desc')
            ->orderBy('hora_inicio', 'desc')
            ->get();
    }

    public function applyFilters()
    {
        $query = Descarga::with('placa');

        // Filtrar por mês selecionado
        if ($this->selectedMonth) {
            $monthStart = Carbon::create()->month($this->selectedMonth)->startOfMonth()->startOfDay()->toDateTimeString();
            $monthEnd = Carbon::create()->month($this->selectedMonth)->endOfMonth()->endOfDay()->toDateTimeString();
            $query->whereBetween('data', [$monthStart, $monthEnd]);
        }

        // Filtrar por dias selecionados
        if ($this->selectedDays !== null && $this->selectedDays !== '') {
            if ($this->selectedDays === '0') {
                $query->whereDate('data', Carbon::today()->toDateString());
            } else {
                $dateFrom = Carbon::now()->subDays($this->selectedDays)->startOfDay()->toDateTimeString();
                $query->whereDate('data', '>=', $dateFrom);
            }
        }

        // Ordenar e obter os resultados
        $this->descargas = $query->orderBy('data', 'desc')
            ->orderBy('hora_inicio', 'desc')
            ->get();
    }

    // Método para limpar os filtros
    public function clearFilters()
    {
        $this->selectedMonth = null;
        $this->selectedDays = null;
        $this->descargas = Descarga::with('placa')
            ->orderBy('data', 'desc')
            ->orderBy('hora_inicio', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.relatorio');
    }
}
