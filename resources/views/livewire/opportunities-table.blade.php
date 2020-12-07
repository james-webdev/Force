<div>

    <div class="col mb8">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
    
            <input wire:model="search" class="form-control" type="text" placeholder="Search opportunities...">
        </div>
    </div>


    <div class="row mb-4">
        @include('livewire.partials._perpage')
        <div class="col form-inline">
            <label class="font-bold" for="status">Stage:</label>
            <select wire:model="stage_id" 
            class="form-control">
                <option value="All">All</option>
                @foreach ($stages as $id=>$stage)
                    <option value={{$id}} >{{$stage}}</option>
                @endforeach
                
            </select>
            <label class="font-bold" for="status">Status:</label>
            <select wire:model="status" 
            class="form-control">
                <option value="All">All</option>
                @foreach ($statuses as $id=>$status)
                    <option value={{$id}} >{{$status}}</option>
                @endforeach
                
            </select>
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
    <table  class="table-fixed">
        <thead>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('account')" role="button" href="#">
                    Company
                    @include('includes._sort-icon', ['field' => 'account'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Opportunity
                    @include('includes._sort-icon', ['field' => 'title'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    Owner
                    @include('includes._sort-icon', ['field'=>'user_id'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('stage_id')" role="button" href="#">
                    Stage
                    @include('includes._sort-icon', ['field' => 'stage_id'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('value')" role="button" href="#">
                    Value
                    @include('includes._sort-icon', ['field' => 'value'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    @include('includes._sort-icon', ['field' => 'status'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Created
                    @include('includes._sort-icon', ['field' => 'created_at'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Close Date
                    @include('includes._sort-icon', ['field' => 'expected_close'])
                </a>
            </th>
            <th class="w-1/8">Last Activity</th>
        </thead>
        <tbody>
        @foreach ($opportunities as $opportunity)
          
            <tr>
               <td class="border border-grey-300">
                    <a href="{{route('account.show', $opportunity->account_id)}}">
                        {{$opportunity->account->name}}
                    </a>
                </td> 
               <td class="border border-grey-300">{{$opportunity->title}}</td> 
               <td class="border border-grey-300">{{$opportunity->owner->name}}</td>
               <td class="border border-grey-300">{{$opportunity->stage->stage}}</td> 
               <td class="border border-grey-300">
                    ${{number_format($opportunity->opportunityValue(),0)}}
               </td> 
               <td class="border border-grey-300">{{$statuses[$opportunity->status]}}</td>
               <td class="border border-grey-300">{{$opportunity->created_at->format('Y-m-d')}}</td>
               <td class="border border-grey-300">
                        {{$opportunity->close_date}}
                </td>
                <td class="border border-grey-300">
                    @if($opportunity->contact && $opportunity->contact->lastActivity)
                    {{$opportunity->contact->lastActivity->activity_date}}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="row mb-4">
            <div class="row-start-4 text-left">
                {{ $opportunities->links() }}
            </div>

            

    </div>
</div>