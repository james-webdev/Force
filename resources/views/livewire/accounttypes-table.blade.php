<div>


     <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500 leading-tight">Account Types</h2>

     <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
    @include('livewire.partials._search', ['placeholder'=>'Search Account Types'])
    <table class="table-fixed mt-2">
        <thead class="bg-teal-100">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('type')" role="button" href="#">
                    Account Type
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'type']) -->
                </a>
            </th>
            <th class="w-1/2 text-center">
             <a wire:click.prevent="sortBy('accounts_count')" role="button" href="#">
                 No. of Accounts
                 <!-- @include('livewire.partials._sort-icon', ['field' => 'accounts_count']) -->
             </a>
         </th>

        </thead>
        <tbody>
            @foreach ($accounttypes as $accounttype)
            <tr>
                <td class="text-left p-1">
                    <a href="{{route('accounttype.show', $accounttype->id)}}">{{$accounttype->type}}</a></td>
                <td class="text-center">{{$accounttype->accounts_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
