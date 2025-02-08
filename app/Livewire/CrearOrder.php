<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCrearOrder;
use Livewire\Component;


class CrearOrder extends Component
{

    public bool $openModalCrear = false;

    public FormCrearOrder $cform;

    public function render()
    {
        return view('livewire.crear-order');
    }

    public function abrirModal(){
        $this->openModalCrear = true;
    }

    public function store(){
        $this->cform->formStore();
        $this->dispatch('onPostCreado')->to(ShowUserOrders::class);
    }

    public function cancelar(){
        $this->openModalCrear=false;
        $this->cform->formReset();
    }

    public function resetCancelar(){
        $this->cform->formReset();
    }
}
