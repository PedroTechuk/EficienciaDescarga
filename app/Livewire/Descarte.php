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

    use Toast;

    public $unidade = 0;
    public $placa;
    public $data;
    public $start;
    public $end;
    public $placas;
    public $descargas;
    public $isStarted = false; // Controle do estado do cronômetro

    protected $rules = [
        'placa' => 'required',
        'start' => 'required',
    ];

    // Mensagens de erro personalizadas
    protected $messages = [
        'placa.required' => 'Por favor, selecione uma placa.',
        'start.required' => 'O cronômetro precisa ser iniciado.',
    ];

    // Scan QRCode
    public $qrCodeData;

    public function handleQrCodeScanned($qrCode)
    {
        $this->qrCodeData = $qrCode;

        return redirect()->route($this->qrCodeData);
    }

    public function mount()
    {
        $this->placas = Placa::all();
        $this->descargas = Descarga::with('placa')->orderBy('data', 'desc')->orderBy('hora_inicio', 'desc')->get();
    }

    // Atualizar a variável $placaSelecionada quando $placa mudar
    public function updatedPlaca($value)
    {
        $this->placaSelecionada = Placa::find($value);
    }

    public function captureStart()
    {
        // Validação completa para garantir que uma placa foi selecionada
        $this->validate([
            'placa' => 'required'
        ]);

        // Se a validação passar, o cronômetro é iniciado
        $this->start = Carbon::now()->format('H:i:s');
        $this->isStarted = true;
    }

    public function create()
    {
        // Validação de todos os campos obrigatórios antes de criar o registro
        $this->validate();

        $this->end = Carbon::now()->format('H:i:s');
        $this->data = Carbon::now()->format('Y-m-d');

        Descarga::create([
            'unidade' => $this->unidade,
            'placa_id' => $this->placa,
            'hora_inicio' => $this->start,
            'hora_fim' => $this->end,
            'data' => $this->data,
        ]);

        // Limpar os valores após a criação do registro
        $this->placa = '';
        $this->start = '';
        $this->end = '';
        $this->placaSelecionada = null; // Resetar a placa selecionada

        // Atualizar a lista de descargas
        $this->descargas = Descarga::all();

        $this->success('Registro criado com sucesso!');

        // Permitir que o cronômetro possa ser iniciado novamente
        $this->isStarted = false;
    }

    public function render()
    {
        return view('livewire.descarte');
    }
}


