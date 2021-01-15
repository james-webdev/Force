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
                Create New Activity
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

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="">

                        <div class="mb-4">

                            <label for="Date"
                                class="block text-gray-700 text-sm font-bold mb-2">Activity Date:</label>

                            <input type="date"
                                required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="activity_date"
                                placeholder="Activity date"
                                wire:model="activity_date">

                                @error('activity_date') <span class="text-red-500"></span>@enderror

                        </div>
                        <div class="mb-4">

                            <label for="status"
                                class="block text-gray-700 text-sm font-bold mb-2">Completed:</label>

                            <input type="checkbox"
                                checked
                                id="status"
                                value="1"
                                wire:model="status">

                                @error('status') <span class="text-red-500"></span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="subject"
                                class="block text-gray-700 text-sm font-bold mb-2">Subject:</label>

                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="subject"
                                placeholder="subject"
                                wire:model="subject">

                                @error('subject') <span class="text-red-500"></span>@enderror

                        </div>

            <div class="mb-4">

                    <label for="details"
                        class="block text-gray-700 text-sm font-bold mb-2">Notes:</label>

                    <div
                        x-data="{
                            content: 'Enter your notes here'
                        }"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                        <alpine-editor
                            x-model="content"
                            wire:model="details"

                        >
                            <div data-type="menu">
                                <button
                                    type="button"
                                    data-command="strong"
                                    data-active-class="bg-teal-100"
                                    class="rounded-sm bg-gray-100 ml-1 mt-1 px-2 py-1"
                                >
                                <i class="fas fa-bold"></i>
                                </button>
                                <button
                                    type="button"
                                    data-command="em"
                                    data-active-class="bg-teal-100"
                                    class="rounded-sm bg-gray-100 mt-1 px-2 py-1"
                                >
                                <i class="h-1 w-1 fas fa-italic"></i>
                                </button>
                                <button type="button"
                                        data-command="code"
                                        data-active-class="bg-teal-100"
                                        class="rounded-sm bg-gray-100 mt-1 px-2 py-1">
                                        < >
                                </button>


                            </div>

                            <div data-type="editor" class="p-2">
                            </div>
                        </alpine-editor>
            </div>

    @error('details') <span class="text-red-500"></span>@enderror

                </div>
                        <!-- <div class="mb-4">

                            <label for="details"
                                class="block text-gray-700 text-sm font-bold mb-2">Notes:</label>

                            <textarea
                                class="form-control summernote shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="summernote"
                                placeholder="details"
                                wire:model="details"></textarea>

                                @error('details') <span class="text-red-500"></span>@enderror

                        </div> -->
                         <div class="mb-4">

                            <label for="type"
                                class="block text-gray-700 text-sm font-bold mb-2">Type:</label>

                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required
                                id="activity_type_id"
                                placeholder="Type"
                                wire:model="activity_type_id">
                                @foreach ($types as $id=>$type)
                                    <option value="{{$id}}">{{$type}}</option>
                                @endforeach

                            </select>

                                @error('activity_type_id') <span class="text-red-500"></span>@enderror

                        </div>
                        @if(! $account_id)
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
                                 wire:click.prevent="storeActivity()"
                                 type="button"
                                 class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-teal-300 text-base leading-6 font-medium text-white shadow-sm hover:bg-teal-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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
