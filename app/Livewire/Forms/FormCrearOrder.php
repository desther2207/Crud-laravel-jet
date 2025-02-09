<?php

namespace App\Livewire\Forms;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;

class FormCrearOrder extends Form
{

    #[Rule(['required', 'string', 'max:100', 'min:10', 'unique:orders,nombre'])]
    public string $nombre = "";

    #[Rule(['required'])]
    public int $cantidad;
    
    #[Rule(['required', 'in:Pendiente,Procesado'])]
    public string $estado = "";

    public function formStore(){
        $this->validate();
        Order::create([
            'nombre'=>$this->nombre,
            'cantidad'=>$this->cantidad,
            'estado'=>$this->estado,
            'user_id'=>Auth::user()->id
        ]);
    }

    public function formReset(){
        $this->reset();
    }
}
