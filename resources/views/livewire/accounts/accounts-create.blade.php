<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>
         <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​


        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="flex w-full h-auto justify-center items-center">
        <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
            Create New Account
        </div>
        <div wire:click="closeModal()" 
        class="flex w-1/12 h-auto justify-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" 
                width="24" 
                height="24" 
                viewBox="0 0 24 24" 
                fill="none" 
                stroke="#000000" 
                stroke-width="2" 
                stroke-linecap="round" 
                stroke-linejoin="round" class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <!--Header End-->
        </div>
            <form>
                @include('livewire.partials._message')
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
                                class="block text-gray-700 text-sm font-bold mb-2">State:</label>

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

                            <label for="phone"
                                class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="phone"
                                placeholder="phone number"
                                wire:model="phone">

                                @error('phone') <span class="text-red-500"></span>@enderror

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
                        <div class="mb-4">

                            <label for="Industry"
                             class="block text-gray-700 text-sm font-bold mb-2">Industry:</label>

                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description"
                                wire:model="industry"
                                placeholder="Select industry">
                                @foreach ($industries as $id=>$industry)
                                <option value="{{$id}}">{{$industry}}</option>
                                @endforeach
                            </select>

                            @error('description') <span class="text-red-500"></span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="Type"
                             class="block text-gray-700 text-sm font-bold mb-2">Source:</label>

                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="account_type_id"
                                wire:model="account_type_id"
                                placeholder="Select source">
                                @foreach ($accounttypes as $id=>$type)
                                <option value="{{$id}}">{{$type}}</option>
                                @endforeach
                            </select>

                            @error('account_type_id') <span class="text-red-500"></span>@enderror

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
