<div>
    <form wire:submit.prevent="submit" class="h-[300px] grid grid-cols-2">
        <!-- total & actions -->
        <div class="flex flex-col justify-center items-center h-full">
            <!-- izquierda -->
            <div class="flex justify-center items-center text-[5em]">
                <p class="text-4xl mb-3">{{ $totalTicket }} €</p>
            </div>
            <div class="flex justify-center items-center text-[5em]">
                <select id="type_pay" wire:model='type_pay' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="tarjeta">tarjeta</option>
                    <option value="efectivo">efectivo</option>
                  </select>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-center items-center p-6 mt-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <span data-modal-hide="ticketModal"
                    class="text-gray-500 bg-white hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-red-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3">Cancelar</span>
                <button data-modal-hide="ticketModal" type="submit"
                    class="text-gray-500 bg-white hover:bg-green-100 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-green-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cobrar</button>
            </div>
        </div>
        <!-- products list -->
        <div class="p-10 text-gray-700 overflow-y-scroll">
            @forelse($products as $product)
                <article>
                    <div class="flex justify-between items-end border-b-2 border-dotted space-y-3">
                        <p class="text-lg font-bold" wire:ignore.self>{{ $product['name'] }} x {{ $product['pivot']['quantity'] }}</p>
                        <p class="text-lg font-bold">{{ $product['pivot']['price'] }} €</p>
                        <p class="text-lg font-bold">{{ $product['pivot']['price'] * $product['pivot']['quantity'] }}</p>
                    </div>
                </article>
            @empty
            <p>Ticket vacío</p>
            @endforelse
        </div>
    </form>
</div>
