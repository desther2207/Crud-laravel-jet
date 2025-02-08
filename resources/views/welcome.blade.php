<x-app-layout>
    <x-selfmade.base>
        <h3 class="mb-2 text-center w-full text-2xl font-bold">
            Listado de pedidos
        </h3>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>
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
                            Fecha pedido
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->user->email}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->nombre}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->estado}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->cantidad}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->updated_at}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{$orders->links()}}
        </div>
    </x-selfmade.base>
</x-app-layout>