

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

        <x-form wire:submit.prevent="storeActivity()" class=px-4>
            @wire
            @include('livewire.partials._message')
            
            
            <x-form-input name="subject" label="Subject" class="border-2 rounded border-gray-200" />    
            <x-form-input type="date" name="activity_date"  label="Activity Date" class="border-2 rounded border-gray-200" />
            <x-form-group>
                <x-form-checkbox checked name="status" label="Completed" />
            </x-form-group>
            <div class="mt-2 bg-white" wire:ignore>
                  <div
                       x-data
                       x-ref="quillEditor"
                       x-init="
                         quill = new Quill($refs.quillEditor, {theme: 'snow'});
                         quill.on('text-change', function () {
                           $dispatch('input', quill.root.innerHTML);
                         });
                       "
                       wire:model.debounce.2000ms="details"
                  >
                    {!! $details !!}
                  </div>
                </div>
            <x-form-select name="activity_type_id" label="Activity Type" :options="$types" class="border-2 rounded border-gray-200"/>
                

            @if(! $account_id)
                <x-form-select name="account_id" label="Account" :options="$accounts" class="border-2 rounded border-gray-200"/>
            
            @else
             <x-form-select name="contact_id" label="Contact" :options="$contacts" class="border-2 rounded border-gray-200"/>
            
            @endif
            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                 <x-form-submit class="rounded">Save</x-form-submit>
                 </span>

                 
            </div>
            @endwire
        </x-form>
        </div>
    </div>
</div>