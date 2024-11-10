<x-layout>
    @session('ticket_creado_correctamente')
        <script type="module">
            const Toast = Swal.mixin({
                toast: true,
                position: "top",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "¡Venta realizada correctamente!"
            });
        </script>
    @endsession
    <div id="pos-system" class="container-full grid grid-cols-10 grid-rows-[auto,auto,auto]">
        <!-- items count -->
        <div id="items-screen" class="bg-gray-50 h-[calc(50vh-2.75rem)] overflow-y-scroll col-span-6 relative">
            <livewire:products.list-tpv :productsTpv="$productsTpv" />
        </div>
        <!-- keyboard -->
        <div id="keyboard" class="bg-blue-400 h-[calc(50vh-2.75rem)] col-span-3">
            <livewire:keyboard />
        </div>
        <!-- groups -->
        <div id="groups" class="bg-green-400 h-[50vh] col-span-4">
            <livewire:groups.group-selector :groups="$groups" />
        </div>
        <!-- products -->
        <div id="products" class="h-[50vh] col-span-5 border-2 border-gray-100">
            <livewire:products.product-selector :products="$products" />
        </div>
        <!-- options -->
        <div id="options"
            class="bg-red-400 col-span-1 col-start-10 row-span-full p-3 flex items-center justify-start flex-col">
            <!-- tables -->
            <div>
                <!-- Modal toggle -->
                <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                    class="block w-20 h-20 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    MESAS
                </button>
                <!-- Main modal -->
                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                    Mesas
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="defaultModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <livewire:tables.select-table />
                            <!-- Modal footer -->
                            <div
                                class="flex justify-center items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="defaultModal" type="button"
                                    class="text-gray-500 bg-white hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-red-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete table -->
            <livewire:tables.delete-table />
            <!-- create table --->
            <livewire:tables.create />
            <!-- ticket -->
            <div>
                <!-- Modal toggle -->
                <button data-modal-target="ticketModal" data-modal-toggle="ticketModal"
                    class="block w-20 h-20 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none mt-3 focus:ring-green-300 font-medium rounded-lg py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    type="button">
                    TICKET
                </button>
                <!-- Main modal -->
                <div id="ticketModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                    Ticket
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="ticketModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div>
                                <livewire:tickets.create />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot:script>
        <script type="module">
            Livewire.on('productSelect', function() {
                console.log("si")
                const productListContainer = document.getElementById('items-screen');
                const lastProduct = productListContainer.lastElementChild;
                lastProduct.scrollIntoView({
                    behavior: 'smooth',
                    block: 'end'
                });
            });

            let keyboardButtons = document.querySelectorAll('.btnKeyboard');

            keyboardButtons.forEach((el, i) => {
                el.addEventListener('click', function() {
                    Livewire.dispatch('eventoDesdeJS', {
                        key: el.innerHTML
                    });
                });
            })

            let rowItems = document.querySelectorAll('.rowItem');

            rowItems.forEach(row => {
                row.addEventListener('click', () => {
                    if (row.classList.contains('selected-row')) {
                        row.classList.remove('selected-row');
                    } else {
                        rowItems.forEach(r => r.classList.remove('selected-row'));
                        row.classList.add('selected-row');
                    }
                });
            });

            window.addEventListener('renderSelectItemInProuctsTpv', event => {
                setTimeout(() => {
                    let rowItems = document.querySelectorAll('.rowItem');
                    rowItems.forEach(row => {
                        row.addEventListener('click', () => {
                            console.log(row);
                            rowItems.forEach(r => r.classList.remove('selected-row'));
                            row.classList.add('selected-row');
                            console.log(rowItems)
                        });
                    });
                }, 300);
            })


            // INCREMENT/PRICE/DTO KEYBOARD
            const incrementKeyboard = document.querySelector('.incrementKeyboard');
            const priceKeyboard = document.querySelector('.priceKeyboard');
            const dtoKeyboard = document.querySelector('.dtoKeyboard');

            incrementKeyboard.addEventListener('click', (el) => {
                if (!document.querySelector('.selected-row')) {
                    alert("no hay nada seleccionado!")
                }

                let inputKeyboard = document.querySelector('.inputKeyboard').value;
                let productSelected = document.querySelector('.selected-row').children[0].innerHTML;
                Livewire.dispatch('incrementProductKeyboard', {
                    productId: productSelected,
                    quantity: inputKeyboard
                });
            })

            priceKeyboard.addEventListener('click', (el) => {
                if (!document.querySelector('.selected-row')) {
                    alert("no hay nada seleccionado!")
                }

                let inputKeyboard = document.querySelector('.inputKeyboard').value;
                let productSelected = document.querySelector('.selected-row').children[0].innerHTML;
                Livewire.dispatch('priceProductKeyboard', {
                    productId: productSelected,
                    price: inputKeyboard
                });
            })

            dtoKeyboard.addEventListener('click', (el) => {
                if (!document.querySelector('.selected-row')) {
                    alert("no hay nada seleccionado!")
                }
                let inputKeyboard = document.querySelector('.inputKeyboard').value;
                let productSelected = document.querySelector('.selected-row').children[0].innerHTML;
                let priceProduct = document.querySelector('.selected-row .priceProduct').getAttribute('value');
                Livewire.dispatch('dtoProductKeyboard', {
                    inputKeyboard: inputKeyboard,
                    productId: productSelected,
                    originalPrice: priceProduct
                });
            })

            Livewire.on('renderSelectItemInProuctsTpv', () => {
                setTimeout(() => {}, 500);
            });
        </script>
    </x-slot>
</x-layout>
