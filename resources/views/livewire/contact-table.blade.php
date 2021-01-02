<div>
<h4 class="mt-4 mb2 font-bold text-xl text-teal-400 font-medium">
       <i class="far fa-address-book text-teal-400"></i> Contacts
    </h4>
    <div class="col mb8">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
    
            <input wire:model="search" class="form-control" type="text" placeholder="Search contacts...">
        </div>
    </div>


    <div class="row mb-4">
        @include('livewire.partials._perpage')
        <div class="col form-inline">
            <label class="font-bold" for="status">Owner:</label>
            <select wire:model="user_id" 
            class="form-control">
                <option value="All">All</option>
                @foreach ($users as $id=>$user)
                    <option value={{$id}} >{{$user}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
    <a 
        wire:click="createContact()"
        class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600"
        ><i class="text-teal-400  fas fa-plus-circle"></i>
        Create New Contact</a>

    @if($isContactOpen)

        @include('livewire.contact-create')

    @endif
    <table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/4">
                <a wire:click.prevent="sortBy('lastName')" role="button" href="#">
                    Name
                    @include('livewire.partials._sort-icon', ['field' => 'lastName'])
                </a>
            </th>
            <th class="w-1/4">
                <a wire:click.prevent="sortBy('company_id')" role="button" href="#">
                    Company
                    @include('livewire.partials._sort-icon', ['field' => 'company_id'])
                </a>
            </th>
            <th class="w-1/4">
                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    Owner
                    @include('livewire.partials._sort-icon', ['field' => 'user_id'])
                </a>
            </th>
            <th class="w-1/4">
                <a wire:click.prevent="sortBy('last_activity_id')" role="button" href="#">
                    Last Activity
                    @include('livewire.partials._sort-icon', ['field' => 'last_activity_id'])
                </a>
            </th>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td class="px-4 border-collapse border border-teal-800">
                    <a href="{{route('contact.show', $contact->id)}}"
                    class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                    {{$contact->fullName()}}
                    </a>
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    @if($contact->company)
                    <a href="{{route('account.show', $contact->account_id)}}"
                    class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                    {{$contact->company->name}}
                    </a>
                    @endif
                </td>
                <td class="px-4 border-collapse border border-teal-800">{{$contact->owner ? $contact->owner->name : ''}}</td>
                <td class="px-4 border-collapse border border-teal-800">{{$contact->last_activity_id  ? $contact->lastActivity->activity_date : ''}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</table>
    <div class="row mb-4">
            <div class="row-start-4 text-left">
                {{ $contacts->links() }}
            </div>

            

    </div>
</div>
