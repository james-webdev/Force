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
                @foreach ($users as $sf_id=>$user)
                    <option value={{$sf_id}} >{{$user}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
</div>
