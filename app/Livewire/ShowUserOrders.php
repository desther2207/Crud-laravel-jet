<?php

namespace App\Livewire;

use App\Livewire\Forms\FormUpdatePost;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserOrders extends Component
{
    use WithPagination;

    public FormUpdatePost $uform;
    public bool $abrirModalUpdate = false;

    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(5);
        return view('livewire.show-user-orders', compact('orders'));
    }



    //-----------------------------------------EDIT------------------------------------------------------------------

    public function cambiarEstado(Order $order){
        $this->authorize('update', $order);
        $estado = ($order->estado==='Pendiente') ? "Procesado" : "Pendiente";
        $order->update([
            'estado'=>$estado
        ]);
    }

    public function edit(Order $order){
        $this->authorize('update', $order);

        $this->uform->setOrder($order);
        $this->abrirModalUpdate=true;
    }

    public function update(){
        $this->uform->formUpdate();
        $this->dispatch('mensaje', 'Post Editado');
        $this->cancelar();
    }

    public function cancelar(){
        $this->abrirModalUpdate = false;

        $this->uform->fCancelar();
    }

    //---------------------------------------- Delete-----------------------------------------------------------------
    public function confirmarDelete(Order $order){
        $this->authorize('delete', $order);
        $this->dispatch('alertaBorrar', $order->id);
    }

    //Lo que borra de verdad
    #[On('onBorrarConfirmado')]
    public function destroy(Order $order){
        $this->authorize('delete', $order);
        $order->delete();
        $this->dispatch('mensaje', 'Pedido Eliminado');
    }
}
