<?php

namespace App\Livewire;

use App\Models\Descarga;
use App\Models\Placa;
use Livewire\Component;
use Mary\Traits\Toast;

class Placas extends Component
{
    use Toast;

    // Modal
    public $placas;
    public $descargas;
    public $isOpen = false;

    public $placa = '';
    public $frota = ''; // Campo frota

    // Regras de validação
    protected $rules = [
        'placa' => ['required', 'regex:/^[A-Z]{3}[0-9]{4}$|^[A-Z]{3}[0-9]{1}[A-Z]{1}[0-9]{2}$/'],
        'frota' => 'required',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function mount()
    {
        // Ordenar as placas pela data de criação de forma decrescente
        $this->placas = Placa::all();
        $this->descargas = Descarga::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        // Converter a placa para uppercase
        $this->placa = strtoupper($this->placa);

        // Validar todos os campos
        $this->validate();

        // Salvar a placa no banco de dados
        Placa::create([
            'placa' => $this->placa,
            'frota' => $this->frota,
        ]);

        // Atualizar a lista de placas
        $this->placas = Placa::all();

        // Resetar os campos
        $this->placa = '';
        $this->frota = '';

        // Adicionar uma mensagem de sucesso
        $this->success('Placa adicionada com sucesso!');;
        $this->closeModal(); // Fechar o modal após salvar
    }

    public function delete($id)
    {
        $placa = Placa::find($id);

        if ($placa) {
            $placa->delete(); // Soft delete
            $this->placas = Placa::orderBy('created_at', 'desc')->get();
            $this->success('Placa removida com sucesso!');
        }
    }

    public function render()
    {
        return view('livewire.placas');
    }
}

