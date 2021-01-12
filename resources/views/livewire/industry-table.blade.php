<div>



    <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500 leading-tight">Industries</h2>
  <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
    @include('livewire.partials._search', ['placeholder'=>'Search Industries'])
    <table  class="table-fixed mt-2">
        <thead class="bg-teal-200">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('industry')" role="button" href="#">
                    Industry
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'industry']) -->
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
            @foreach ($industries as $industry)
            <tr>
                <td class="text-left p-1">
                    <a href="{{route('industry.show', $industry->id)}}">{{$industry->industry}}</a></td>
                <td class="text-center">{{$industry->accounts_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
