<div>
    <h2>Account Types</h2>
   
    @include('livewire.partials._perPage')
    @include('livewire.partials._search', ['placeholder'=>'Search Industries'])
    <table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('type')" role="button" href="#">
                    Account Type
                    @include('livewire.partials._sort-icon', ['field' => 'type'])
                </a>
            </th>
            <th class="w-1/2 text-center">
             <a wire:click.prevent="sortBy('accounts_count')" role="button" href="#">
                 # Accounts
                 @include('livewire.partials._sort-icon', ['field' => 'accounts_count'])
             </a>
         </th>

        </thead>
        <tbody>
            @foreach ($accounttypes as $type)
            <tr>
                <td class="text-left">
                    <a href="{{route('accounttypes.show', $type->id)}}">{{$type->type}}</a></td>
                <td class="text-center">{{$type->accounts_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
