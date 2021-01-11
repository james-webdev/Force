<div>


    <h2>Sales Stages</h2>

    @include('livewire.partials._perPage')
    @include('livewire.partials._search', ['placeholder'=>'Search Sales Stages'])
    <table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('stage')" role="button" href="#">
                    Sales Stages
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'type']) -->
                </a>
            </th>


        </thead>
        <tbody>
            @foreach ($stages as $stage)
            <tr>
                <td class="text-left">
                    <a href="{{route('stages.show', $stage->id)}}">{{$stage->stage}}</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

