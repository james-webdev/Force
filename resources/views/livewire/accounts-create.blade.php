<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>
         <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​


        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="">

                        <div class="mb-4">

                            <label for="Name"
                                class="block text-gray-700 text-sm font-bold mb-2">Name:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name"
                                placeholder="Company Name"
                                wire:model="name">

                                @error('name') <span class="text-red-500"></span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="street"
                                class="block text-gray-700 text-sm font-bold mb-2">Street:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="street"
                                placeholder="Street address"
                                wire:model="street">

                                @error('street') <span class="text-red-500"></span>@enderror

                        </div>
                        <div class="mb-4">

                            <label for="city"
                                class="block text-gray-700 text-sm font-bold mb-2">City:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="city"
                                placeholder="City"
                                wire:model="city">

                                @error('city') <span class="text-red-500"></span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="state"
                                class="block text-gray-700 text-sm font-bold mb-2">Street:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="state"
                                placeholder="State code"
                                wire:model="state">

                                @error('state') <span class="text-red-500"></span>@enderror

                        </div>
                        <div class="mb-4">

                            <label for="postalcode"
                                class="block text-gray-700 text-sm font-bold mb-2">Post code:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="postalcode"
                                placeholder="Postal code"
                                wire:model="postalcode">

                                @error('street') <span class="text-red-500"></span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="description"
                             class="block text-gray-700 text-sm font-bold mb-2">Description:</label>

                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description"
                                wire:model="description"
                                placeholder="Enter Body">
                            </textarea>

                            @error('description') <span class="text-red-500"></span>@enderror

                        </div>

                    </div>

                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                     <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                         <button
                             wire:click.prevent="store()"
                             type="button"
                             class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-teal-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-teal-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                         Save
                         </button>
                     </span>

                     <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                         <button
                             wire:click="closeModal()"
                             type="button"
                             class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                             Cancel
                         </button>
                     </span>
                </div>

            </form>

         </div>

     </div>

</div>
