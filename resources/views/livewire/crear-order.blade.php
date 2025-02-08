<div>
    <x-button wire:click="$set('openModalCrear', true)" class="font-bold"><i class="fas fa-add mr-2"></i>NUEVO</x-button>
    <x-dialog-modal wire:model="openModalCrear">
        <x-slot name="title">
            Crear Pedido
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
                        <input type="text" id="nombre" name="nombre" wire:model="cform.nombre" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <x-input-error for="cform.nombre" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Estado:</label>
                        <div class="flex items-center space-x-4 mt-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="estado" wire:model="cform.estado" value="Procesado" class="text-blue-600 focus:ring-blue-500">
                                <span class="text-gray-700">Procesado</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="estado" wire:model="cform.estado" value="Pendiente" required class="text-blue-600 focus:ring-blue-500">
                                <span class="text-gray-700">Pendiente</span>
                            </label>
                            <x-input-error for="cform.estado" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
                        <input type="number" id="cantidad" wire:model="cform.cantidad" name="cantidad" step="0.01" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <x-input-error for="cform.cantidad" />
                    </div>
                </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" wire:click="store" wire:loading.attr="hidden" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Enviar</button>
        </x-slot>
    </x-dialog-modal>
</div>