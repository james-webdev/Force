<div>


    <h2>Activity Types</h2>

    @include('livewire.partials._perPage')
    @include('livewire.partials._search', ['placeholder'=>'Search Activity Types'])
    <table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('type')" role="button" href="#">
                    Aactivity Type
                    @include('livewire.partials._sort-icon', ['field' => 'type'])
                </a>
            </th>
            <th class="w-1/2 text-center">
             <a wire:click.prevent="sortBy('accounts_count')" role="button" href="#">
                 # Activities
                 @include('livewire.partials._sort-icon', ['field' => 'activities_count'])
             </a>
         </th>

        </thead>
        <tbody>
            @foreach ($activitytypes as $activitytype)
  
            <tr>
                <td class="text-left">
                    <a href="{{route('activitytype.show', $activitytype->id)}}">{{$activitytype->activity}}</a></td>
                <td class="text-center">{{$activitytype->activities_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
