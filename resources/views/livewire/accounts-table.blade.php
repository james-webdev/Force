<div>
    <div class="col mb8">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
    
            <input wire:model="search" class="form-control" type="text" placeholder="Search accounts...">
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
    <table  class="table-fixed">
        <thead>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Company
                    @include('livewire.partials._sort-icon', ['field' => 'name'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('city')" role="button" href="#">
                    City
                    @include('livewire.partials._sort-icon', ['field' => 'city'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('state')" role="button" href="#">
                    State
                    @include('livewire.partials._sort-icon', ['field' => 'state'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('owner')" role="button" href="#">
                    Owner
                    @include('livewire.partials._sort-icon', ['field' => 'owner'])
                </a>
            </th>
            <th class="w-1/8">
                <a wire:click.prevent="sortBy('open_oppportunity_count')" role="button" href="#">
                    # Open Opportunities
                    @include('livewire.partials._sort-icon', ['field' => 'open_oppportunity_count'])
                </a>
            </th>
            <th class="w-1/8">
                
                    Last Activity Date
                    
            </th>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
            <tr>
                <td>
                    <a href="{{route('account.show', $account->id)}}">
                        {{$account->name}}
                    </a>
                </td>
                <td>{{$account->city}}</td>
                <td>{{$account->state}}</td>
                <td>{{$account->owner->name}}</td>
                <td>{{$account->open_opportunities_count}}</td>
                <td></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

