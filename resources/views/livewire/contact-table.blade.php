<div>
User is {{$user_id}}
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
    <table  class="table-fixed">
        <thead>
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
                <td>{{$contact->fullName()}}</td>
                <td>{{$contact->company ? $contact->company->name : ''}}</td>
                <td>{{$contact->owner ? $contact->owner->name : ''}}</td>
                <td>{{$contact->last_activity_id  ? $contact->lastActivity->activity_date : ''}}</td>
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
