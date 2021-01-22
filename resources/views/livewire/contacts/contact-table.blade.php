<div>



@include('livewire.partials._message')
<div class="sm:ml-24 mt-7 sm:mr-24 flex flex-col justify-center items-center sm:block">

        <h2 class="text-4xl text-teal-400 p-5 hover:text-teal-500 leading-tight">
            Contacts
        </h2>

        @if($isOpen)

        @include('livewire.contacts.contact-create')

        @endif

<div class="sm:flex sm:justify-between mt-5 sm:items-center">
<div class="">
    <div class="sm:m-8">
        <div class="">
        <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->

            <input wire:model="search" class="p-2 sm:w-96 form-control rounded border border-gray-200" type="text" placeholder="Search contacts...">
        </div>
    </div>


</div>
<div class="sm:mr-8 mt-4 sm:mt-0 flex justify-center items-center">
    <button
        wire:click="createContact()"
        class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
        Create New Contact</a>

    </button>
</div>
</div>

    <div class="p-3 w-full sm:flex sm:justify-between text-md border border-gray-200 sm:items-center rounded bg-gray-100 shadow-sm mt-1">
        <div class="flex justify-center items-center m-1 form-inline">
            <label class="font-bold" for="status">Owner: &nbsp; ↓</label>
            <select wire:model="user_id"
            class="form-control rounded-sm p-1 appearance-none">
                <option value="All">All</option>
                @foreach ($users as $id=>$user)
                    <option value="{{$id}}" class="p-3" >{{$user}}</option>
                @endforeach

            </select>
        </div>
        <div class="flex justify-center">
                @include('livewire.partials._perpage')
        </div>
    </div>
</div>
<div class="sm:w-3/4 flex justify-center items-center w-3/5 m-auto mt-10">
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
            <th class="hidden sm:table-cell">
             <x-thead>
                <a wire:click.prevent="sortBy('email')" role="button" href="#">
                    Email
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'email']) -->
                </a>
             </x-thead>
            </th>
            <th class="hidden sm:table-cell">
              <x-thead>
                <a wire:click.prevent="sortBy('company_id')" role="button" href="#">
                    Company
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'company_id']) -->
                </a>
              </x-thead>
            </th>
            <th class="hidden sm:table-cell">
              <x-thead>
                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    Owner
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'user_id']) -->
                </a>
              </x-thead>
            </th>
            <th class="hidden sm:table-cell">
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
                <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                        <a href="mailto:{{$contact->email}}"
                            target="_blank"
                        class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$contact->email}}
                        </a>
                    </x-tbody>
                </td>
                <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                        @if($contact->company)
                        <a href="{{route('account.show', $contact->account_id)}}"
                        class=" text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$contact->company->name}}
                        </a>
                        @endif
                    </x-tbody>
                </td>
                <td class="border border-gray-200 hidden sm:table-cell" >
                  <x-tbody>
                    {{$contact->owner ? $contact->owner->name : ''}}
                  </x-tbody>
                </td>

                <td class="border border-gray-200 hidden sm:table-cell">
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
