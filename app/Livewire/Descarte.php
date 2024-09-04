<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Descarga;
use App\Models\Placa;
use Mary\Traits\Toast;

class Descarte extends Component
{
    use Toast;

    public $unidade = 0;
    public $placa;
    public $data;
    public $placas;
    public $descargas;

    protected $rules = [
        'placa' => 'required',
    ];

    // Mensagens de erro personalizadas
    protected $messages = [
        'placa.required' => 'Por favor, selecione uma placa.',
    ];

    // Scan QRCode
    public $qrCodeData;

    public function handleQrCodeScanned($qrCode)
    {
        $this->qrCodeData = $qrCode;
        $this->placa = $qrCode;
    }

    public function mount()
    {
        $this->placas = Placa::all();
        $this->descargas = Descarga::with('placa')->orderBy('data', 'desc')->orderBy('hora_inicio', 'desc')->get();
    }

    public function updatedPlaca($value)
    {
        $this->placaSelecionada = Placa::find($value);
    }

    public function create()
    {
        // Validação para garantir que uma placa foi selecionada
        $this->validate();

        $this->data = Carbon::now('America/Sao_Paulo')->format('Y-m-d');

        Descarga::create([
            'unidade' => $this->unidade,
            'placa_id' => $this->placa,
            'hora_inicio' => Carbon::now('America/Sao_Paulo')->format('H:i:s'),
            'hora_fim' => Carbon::now('America/Sao_Paulo')->format('H:i:s'),
            'data' => $this->data,
        ]);

        // Limpar os valores após a criação do registro
        $this->placa = '';
        $this->placaSelecionada = null;

        // Limpar as mensagens de erro e validação
        $this->resetValidation();

        // Atualizar a lista de descargas
        $this->descargas = Descarga::all();

        $this->success('Registro criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.descarte');
    }
}


