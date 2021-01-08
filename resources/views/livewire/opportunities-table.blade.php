<div>
    <h4 class="mt-4 mb-2 font-bold text-xl text-teal-400 font-medium">
        <i class="far fa-money-bill-alt text-teal-400"></i> Opportunities
    </h4>
    @include('livewire.partials._search', ['placeholder'=>'Search activities'])
       
    <div class="row mb-4">
        @include('livewire.partials._perpage')
        
        <label class="font-bold" for="status">Status:</label>
        <select wire:model="status" 
        class="form-control">
            <option value="All">All</option>
            @foreach ($statuses as $id=>$status)
                <option value={{$id}} >{{$status}}</option>
            @endforeach
            
        </select>
        @include('livewire.partials._ownerselector')
    </div>
    <a 
        wire:click="createOpportunity()"
        class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600"
        ><i class="text-teal-400  fas fa-plus-circle"></i>
        Create New Opportunity</a>

        @if($isOpportunityOpen)

            @include('livewire.opportunity-create')
        @endif
    <div class="row">
    <table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('account')" role="button" href="#">
                    Company
                    @include('livewire.partials._sort-icon', ['field' => 'account'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Opportunity
                    @include('livewire.partials._sort-icon', ['field' => 'title'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    Owner
                    @include('livewire.partials._sort-icon', ['field'=>'user_id'])
                </a>
            </th>
            
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('value')" role="button" href="#">
                    Value
                    @include('livewire.partials._sort-icon', ['field' => 'value'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    @include('livewire.partials._sort-icon', ['field' => 'status'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Created
                    @include('livewire.partials._sort-icon', ['field' => 'created_at'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Close Date
                    @include('livewire.partials._sort-icon', ['field' => 'expected_close'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">Last Activity</th>
        </thead>
        <tbody>
        @foreach ($opportunities as $opportunity)
          
            <tr>
               <td class="px-4 border-collapse border border-teal-800">
                    <a href="{{route('account.show', $opportunity->account_id)}}"
                         class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                        {{$opportunity->account ? $opportunity->account->name : ''}}
                    </a>
                </td> 
               <td class="px-4 border-collapse border border-teal-800">
                <a href="{{route('opportunity.show', $opportunity->id)}}"
                     class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                {{$opportunity->title}}
            </a>
            </td> 
               <td class="px-4 border-collapse border border-teal-800">
                {{$opportunity->owner ? $opportunity->owner->name : ''}}</td>
               
               <td class="px-4 text-right border-collapse border border-teal-800">
                    ${{number_format($opportunity->opportunityValue(),0)}}
               </td> 
               <td class="px-4 border-collapse border border-teal-800">{{$statuses[$opportunity->status]}}</td>
               <td class="px-4 border-collapse border border-teal-800">{{$opportunity->created_at->format('Y-m-d')}}</td>
               <td class="px-4 border-collapse border border-teal-800">
                        {{$opportunity->close_date->format('Y-m-d')}}
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    @if($opportunity->contact && $opportunity->contact->lastActivity)
                    {{$opportunity->contact->lastActivity->activity_date}}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

    <div class="row mb-4">
            <div class="row-start-4 text-left">
                {{ $opportunities->links() }}
            </div>

            

    </div>
</div>

