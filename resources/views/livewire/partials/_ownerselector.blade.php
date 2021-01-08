
    <label class="font-bold" for="status">Owner:</label>
    <select wire:model="user_id" 
    class="form-control">
        <option value="All">All</option>
        @foreach ($users as $id=>$user)
            <option value={{$id}} >{{$user}}</option>
        @endforeach
        
    </select>
