<div>
    <h2>Industries</h2>
   
    @include('livewire.partials._perPage')
    @include('livewire.partials._search', ['placeholder'=>'Search Industries'])
    <table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('industry')" role="button" href="#">
                    Industry
                    @include('livewire.partials._sort-icon', ['field' => 'industry'])
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
            @foreach ($industries as $industry)
            <tr>
                <td class="text-left">
                    <a href="{{route('industries.show', $industry->id)}}">{{$industry->industry}}</a></td>
                <td class="text-center">{{$industry->accounts_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
