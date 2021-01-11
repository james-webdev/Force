<div>

        <h2 class="text-4xl mt-7 text-teal-400 p-5 hover:text-teal-500 leading-tight">
            Contacts
        </h2>
        <!-- <i class="far fa-address-book text-teal-400"></i> -->


        @if($isContactOpen)

@include('livewire.contact-create')

@endif

<div class="flex justify-between mt-5 items-center">
<div class="flex justify-left items-center">
    <div class="col m-8">
        <div class="input-group-prepend">
        <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->

            <input wire:model="search" class="p-2 w-96 form-control rounded border border-gray-200" type="text" placeholder="Search contacts...">
        </div>
    </div>


</div>
<div class="mr-8">
    <button
        wire:click="createContact()"
        class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
        Create New Contact</a>

    </button>
</div>
</div>

    <div class="p-3 flex justify-between text-md border border-gray-200 items-center rounded bg-gray-100 shadow-sm mt-1">
        <div class="col m-1 form-inline">
            <label class="font-bold" for="status">Owner: &nbsp; ↓</label>
            <select wire:model="user_id"
            class="form-control rounded-sm p-1 appearance-none">
                <option value="All">All</option>
                @foreach ($users as $sf_id=>$user)
                    <option value={{$sf_id}} class="p-3" >{{$user}}</option>
                @endforeach

            </select>
        </div>
        @include('livewire.partials._perpage')
    </div>

<div class="w-3/4 m-auto mt-10">
    <table class="table-fixed shadow-md">
        <thead class="bg-teal-100">
            <th>
             <x-thead>
                <a wire:click.prevent="sortBy('lastName')" role="button" href="#">
                    Name
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'lastName']) -->
                </a>
             </x-thead>
            </th>
            <th>
              <x-thead>
                <a wire:click.prevent="sortBy('company_id')" role="button" href="#">
                    Company
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'company_id']) -->
                </a>
              </x-thead>
            </th>
            <th>
              <x-thead>
                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    Owner
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'user_id']) -->
                </a>
              </x-thead>
            </th>
            <th>
              <x-thead>
                <a wire:click.prevent="sortBy('last_activity_id')" role="button" href="#">
                    Last Activity
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'last_activity_id']) -->
                </a>
              </x-thead>
            </th>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr class="bg-white border rounded border-gray-300 border-1">
                <td class="border border-gray-200">
                    <x-tbody>
                        <a href="{{route('contact.show', $contact->id)}}"
                        class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$contact->fullName()}}
                        </a>
                    </x-tbody>
                </td>
                <td class="border border-gray-200">
                    <x-tbody>
                        @if($contact->company)
                        <a href="{{route('account.show', $contact->account_id)}}"
                        class=" text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$contact->company->name}}
                        </a>
                        @endif
                    </x-tbody>
                </td>
                <td class="border border-gray-200" >
                  <x-tbody>
                    {{$contact->owner ? $contact->owner->name : ''}}
                  </x-tbody>
                </td>

                <td class="border border-gray-200">
                    <x-tbody>
                        {{$contact->last_activity_id  ? $contact->lastActivity->activity_date : ''}}
                    </x-tbody>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div class="row mt-28">
            <div class="row-start-4 text-left">
                {{ $contacts->links() }}
            </div>



    </div>
</div>
