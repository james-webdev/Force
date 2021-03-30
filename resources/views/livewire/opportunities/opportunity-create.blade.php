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
            <x-form wire:submit.prevent="storeOpportunity()" class=px-4>
                @wire
                @include('livewire.partials._message')
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <x-form-input name="title" label="Title:" placeholder="Opportunity title" />
                    <x-form-input type="date" name="close_date" label="Expected Close Date:" />
                    <x-form-input type="number" name="value" label="Value:" placehodler="Value in whole dollars." />
                    <x-form-textarea name="description" label="Notes:" />
                    <x-form-select name="stage_id" label="Current Stage:" :options="$stages" />
                    @if(is_null($account_id))
                        <x-form-select name="account_id" label="Account:" :options="$accounts" />
                    @else
                        <x-form-select name="contact_id" label="Associated Contact:" :options="$contacts" />

                    @endif
                    <x-form-submit>Save</x-form-submit>   
                </div>
                @endwire
            </x-form>

         </div>

     </div>
    }

</div>
