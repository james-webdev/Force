<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>
         <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​


        <!-- Header -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" 
            role="dialog" 
            aria-modal="true" 
            aria-labelledby="modal-headline">
            <div class="flex w-full h-auto justify-center items-center">
            <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                Create New Opportunity
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

                            <label for="email"
                                class="block text-gray-700 text-sm font-bold mb-2">Title:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="title"
                                placeholder="Opportunity title"
                                wire:model="title">

                                @error('title') <span class="text-red-500"></span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="close_date"
                                class="block text-gray-700 text-sm font-bold mb-2">Expected Close Date:</label>

                            <input type="date"
                                required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="close_date"
                                placeholder="Close date"
                                wire:model="close_date">

                                @error('close_date') <span class="text-red-500"></span>@enderror

                        </div>


                        <div class="mb-4">

                            <label for="email"
                                class="block text-gray-700 text-sm font-bold mb-2">VAlue:</label>

                            <input type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="value"
                                placeholder="Value in whole dollars."
                                wire:model="value">

                                @error('value') <span class="text-red-500"></span>@enderror

                        </div>
                        <div class="mb-4">

                            <label for="description"
                                class="block text-gray-700 text-sm font-bold mb-2">Description:</label>

                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description"
                                placeholder="Description"
                                wire:model="description"></textarea>

                                @error('description') <span class="text-red-500"></span>@enderror

                        </div>


                        <div class="mb-4">

                            <label for="type"
                                class="block text-gray-700 text-sm font-bold mb-2">Current Stage:</label>

                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required
                                id="stage_id"
                                placeholder="Stage"
                                wire:model="stage_id">
                                @foreach ($stages as $id=>$stage)
                                    <option value="{{$id}}">{{$stage}}</option>
                                @endforeach

                            </select>

                                @error('activity_type_id') <span class="text-red-500"></span>@enderror

                        </div>
                        @if(is_null($account_id))
                        <div class="mb-4">

                            <label for="contact_id"
                                class="block text-gray-700 text-sm font-bold mb-2">Account:</label>

                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"

                                id="account_id"
                                placeholder="Account"
                                wire:model="account_id">
                                @foreach ($accounts as $id=>$account)
                                    <option value="{{$id}}">{{$account}}</option>
                                @endforeach

                            </select>

                                @error('account_id') <span class="text-red-500"></span>@enderror

                        </div>
                        @else
                        <div class="mb-4">

                            <label for="contact_id"
                                class="block text-gray-700 text-sm font-bold mb-2">Associated Contact:</label>

                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"

                                id="contact_id"
                                placeholder="Contact"
                                wire:model="contact_id">
                                @foreach ($contacts as $contact)
                                    <option value="{{$contact->id}}">{{$contact->fullName()}}</option>
                                @endforeach

                            </select>

                                @error('contact_id') <span class="text-red-500"></span>@enderror

                        </div>
                        @endif

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                         <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                             <button
                                 wire:click.prevent="storeOpportunity()"
                                 type="button"
                                 class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-teal-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                             Save
                             </button>
                         </span>

                     <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                         <button
                             wire:click="closeOpportunityModal()"
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
