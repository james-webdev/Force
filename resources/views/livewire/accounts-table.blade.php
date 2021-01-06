<div>
   
    <button 
        wire:click="create()" 
        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded my-3">
        Create New Account</button>

    @if($isOpen)

        @include('livewire.accounts-create')

    @endif
    @component('livewire.partials._search')
        @slot('placeholder')
            Search accounts
        @endslot
    @endcomponent

    <div class="row mb-4">
        @include('livewire.partials._perpage')
        @include('livewire.partials._ownerselector')
        <div class="col form-inline">
            <label class="font-bold" for="status">Industry:</label>
            <select wire:model="industry_id" 
            class="form-control">
                <option value="All">All</option>
                @foreach ($industries as $id=>$industry)
                    <option value={{$id}} >{{$industry}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
    <table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Company
                    @include('livewire.partials._sort-icon', ['field' => 'name'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('city')" role="button" href="#">
                    City
                    @include('livewire.partials._sort-icon', ['field' => 'city'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('state')" role="button" href="#">
                    State
                    @include('livewire.partials._sort-icon', ['field' => 'state'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                   Industry
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('owner')" role="button" href="#">
                    Owner
                    @include('livewire.partials._sort-icon', ['field' => 'owner'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('contacts_count')" role="button" href="#">
                    # Contacts
                    @include('livewire.partials._sort-icon', ['field' => 'contacts_count'])
                </a>
            </th>
            
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('open_opportunities_count')" role="button" href="#">
                    # Open Opportunities
                    @include('livewire.partials._sort-icon', ['field' => 'open_opportunities_count'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                
                    Last Activity Date
                    
            </th>
            <th  class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('closed_business')" role="button" href="#">
                Total Business
                 @include('livewire.partials._sort-icon', ['field' => 'closed_business'])
            </th>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
          
            <tr>
                <td class="px-4 border-collapse border border-teal-800">
                    <a href="{{route('account.show', $account->id)}}"
                        class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                        {{$account->name}}
                    </a>
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    {{$account->city}}
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    {{$account->state}}
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    {{$account->industry ? $account->industry->industry : ''}}
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    {{$account->owner->name}}
                </td>
                
                <td class="px-4 border-collapse border border-teal-800">
                    {{$account->contacts_count}}
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    {{$account->open_opportunities_count}}
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    @if ($account->lastActivity) 
                        {{$account->lastActivity->activity_date}}
                    @endif
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    
                        ${{number_format($account->closed_business,0)}}
                  
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row mb-4">
            <div class="row-start-4 text-left">
                {{ $accounts->links() }}
            </div>

            

    </div>
</div>

