<?php

namespace App\Livewire;

use App\Models\Descarga;
use App\Models\Placa;
use Carbon\Carbon;
use Livewire\Component;
use Mary\Traits\Toast;

class Relatorio extends Component
{
    use Toast;

    public $placas;
    public $descargas;
    public $selectedYear;  // Propriedade para o ano selecionado
    public $selectedMonth; // Propriedade para o mês selecionado
    public $selectedDay;   // Propriedade para o dia selecionado
    public $years;         // Array para anos
    public $months;        // Array para meses

    public function mount()
    {
        \Carbon\Carbon::setLocale('pt_BR');
        $this->placas = Placa::all();

        $this->years = range(Carbon::now()->year, Carbon::now()->year );

        $this->months = [
            '' => 'Todos os Meses',
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro',
        ];

        // Aplicar os filtros na inicialização
        $this->applyFilters();
    }

    public function applyFilters()
    {
        $query = Descarga::with('placa');

        // Sempre aplicar o filtro para o ano fixo (já resolvido por você)
        $query->whereYear('data', 2024);

        // Aplicar filtro por mês se selecionado
        if ($this->selectedMonth) {
            $query->whereMonth('data', $this->selectedMonth);
        }

        // Aplicar filtro por dia se selecionado
        if ($this->selectedDay) {
            $query->whereDay('data', $this->selectedDay);
        }

        // Executar a consulta com ordenação
        $this->descargas = $query->orderBy('data', 'desc')
            ->orderBy('hora_inicio', 'desc')
            ->get();
    }

    public function clearFilters()
    {
        $this->selectedYear = null;
        $this->selectedMonth = null;
        $this->selectedDay = null;

        // Recarregar todas as descargas sem filtros
        $this->applyFilters();
    }

    public function delete($id)
    {
        $descarga = Descarga::findOrFail($id);
        $descarga->delete();
        $this->applyFilters();
        $this->success('Placa removida com sucesso!');
    }

    public function render()
    {
        return view('livewire.relatorio');
    }
}
