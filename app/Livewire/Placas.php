<?php

namespace App\Livewire;

use App\Models\Descarga;
use App\Models\Placa;
use Livewire\Component;

class Placas extends Component
{
    // Modal
    public $placas;
    public $descargas;
    public $isOpen = false;

    public $placa = '';
    public $frota = ''; // Campo frota

    // Regras de validação
    public function updatedMercosul($value)
    {
        if ($value) {
            // Se Mercosul estiver habilitado
            $this->rules['placa'] = ['required', 'regex:/^[A-Z]{3}[0-9]{1}[A-Z]{1}[0-9]{2}$/'];
        } else {
            // Se Mercosul estiver desabilitado
            $this->rules['placa'] = ['required', 'regex:/^[A-Z]{3}[0-9]{4}$/'];
        }
    }


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

        $this->validate();

        // Salvar a placa no banco de dados
        Placa::create([
            'placa' => $this->placa,
            // Remover o campo 'frota' se não for mais necessário
            // 'frota' => $this->frota,
        ]);

        // Atualizar a lista de placas
        $this->placas = Placa::all();

        // Resetar os campos
        $this->placa = '';
        $this->frota = '';

        session()->flash('message', 'Placa adicionada com sucesso!');
        $this->closeModal(); // Fechar o modal após salvar
    }

    public function render()
    {
        return view('livewire.placas');
    }
}
