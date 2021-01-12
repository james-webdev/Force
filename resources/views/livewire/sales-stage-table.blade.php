<div>


    <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500">Sales Stages</h2>

    <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
    @include('livewire.partials._search', ['placeholder'=>'Search Sales Stages'])
    <table  class="table-fixed mt-2 p-1">
        <thead class="bg-teal-200 p-1">
            <th class="w-1/2 mt-1">
                <a wire:click.prevent="sortBy('stage')" role="button" href="#">
                    Sales Stages
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'stage']) -->
                </a>
            </th>
            <th class="w-1/2 mt-1">
                <a wire:click.prevent="sortBy('opportunities_count')" role="button" href="#">
                    No. of Opportunities
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'opportunities_count']) -->
                </a>
            </th>


        </thead>
        <tbody>
            @foreach ($stages as $stage)
            <tr>
                <td class="text-left p-1">
                    <a href="{{route('stages.show', $stage->id)}}">
                       {{$stage->stage}}
                    </a>
                </td>
                <td class="text-left p-1">
                    <a href="{{route('stages.show', $stage->id)}}">
                        {{$stage->opportunities_count}}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

