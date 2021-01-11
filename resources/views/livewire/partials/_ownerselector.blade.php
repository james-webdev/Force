<div class="col form-inline">
    <label class="font-bold" for="status">Owner: &nbsp;↓</label>
    <select wire:model="user_id"
    class="form-control rounded-sm p-1 appearance-none">
        <option value="All">All</option>
        @foreach ($users as $id=>$user)
            <option value={{$id}} >{{$user}}</option>
        @endforeach

    </select>
</div>
