<x-selfmade.base>
    <h3 class="mb-2 text-center w-full text-2xl font-bold">
        Listado de pedidos de {{$orders[0]->user->email}}
    </h3>

    <!-- Cambia "flex" por "flex-col" para apilar los elementos verticalmente -->
    <div class="flex-col w-full items-center justify-between">

        <div class="mb-4"> <!-- Añade margen inferior para separar los elementos -->
            @livewire('crear-order')
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{$item->nombre}}
                        </td>
                        <td class="px-6 py-4">
                            <div @class([ 'p-2 text-white font-bold rounded-xl cursor-pointer' , 'bg-red-500 hover:bg-red-600'=> $item->estado == "Pendiente",
                                'bg-green-500 hover:bg-green-600' => $item->estado == "Procesado",
                                ]) wire:click="cambiarEstado({{$item->id}})">
                                {{$item->estado}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{$item->cantidad}}
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="edit({{$item->id}})"><i class="fas fa-edit text-blue-500 text-lg hover:text-xl"></i></button>
                            <button wire:click="confirmarDelete({{$item->id}})"><i class="fas fa-trash text-red-500 text-lg hover:text-xl"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{$orders->links()}}
        </div>
        <!----------------------------------------------------Modal para update----------------------------------------------------------------------------------------->
        <x-dialog-modal wire:model="abrirModalUpdate">
            <x-slot name="title">
                Editar Pedido
            </x-slot>
            <x-slot name="content">
                <!DOCTYPE html>
                <html lang="es">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Formulario de Pedido</title>
                    <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg p-6">
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" wire:model="uform.nombre" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <x-input-error for="uform.nombre" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Estado:</label>
                            <div class="flex items-center space-x-4 mt-2">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="estado" wire:model="uform.estado" value="Procesado" class="text-blue-600 focus:ring-blue-500">
                                    <span class="text-gray-700">Procesado</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="estado" wire:model="uform.estado" value="Pendiente" required class="text-blue-600 focus:ring-blue-500">
                                    <span class="text-gray-700">Pendiente</span>
                                </label>
                                <x-input-error for="uform.estado" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
                            <input type="number" id="cantidad" wire:model="uform.cantidad" name="cantidad" step="0.01" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <x-input-error for="uform.cantidad" />
                        </div>
                    </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" wire:click="update" wire:loading.attr="hidden" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Enviar</button>
            </x-slot>
        </x-dialog-modal>
    </div>
</x-selfmade.base>