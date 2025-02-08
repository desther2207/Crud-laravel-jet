<?php

namespace App\Livewire\Forms;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;

class FormUpdatePost extends Form
{

    public ?Order $order = null;

    public string $titulo = "";

    #[Rule(['required', 'string', 'max:100', 'min:10', 'unique:orders,nombre'])]
    public string $nombre = "";

    #[Rule(['required'])]
    public ?float $cantidad;
    
    #[Rule(['required', 'in:Procesado,Pendiente'])]
    public string $estado = "";



    public function formReset(){
        $this->reset();
    }

    public function rules(){
        return [
            'nombre'=>['required', 'string', 'min:10', 'max:100', 'unique:orders, nombre,'.$this->order->id]
        ];
    }

    public function setOrder(Order $order){
        $this->order=$order;
        $this->nombre=$order->nombre;
        $this->estado=$order->estado;
        $this->cantidad=$order->cantidad;
    }

    public function formUpdate(){
        $this->validate();
        $this->order->update([
            'nombre'=>$this->nombre,
            'cantidad'=>$this->cantidad,
            'estado'=>$this->estado,
        ]);
    }

    public function fCancelar(){
        $this->reset();
    }
}
