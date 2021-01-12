<div>


    <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500 leading-tight">Activity Types</h2>

  <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
    @include('livewire.partials._search', ['placeholder'=>'Search Activity Types'])
    <table  class="table-fixed mt-2">
        <thead class="bg-teal-200">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('activity')" role="button" href="#">
                    Activity Type
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'activity']) -->
                </a>
            </th>
            <th class="w-1/2 text-center">
             <a wire:click.prevent="sortBy('activities_count')" role="button" href="#">
                 No. of Activities
                 <!-- @include('livewire.partials._sort-icon', ['field' => 'activities_count']) -->
             </a>
         </th>

        </thead>
        <tbody>
            @foreach ($activitytypes as $activitytype)
            <tr>
                <td class="text-left p-1">
                    <a href="{{route('activitytype.show', $activitytype->id)}}">{{$activitytype->activity}}</a></td>
                <td class="text-center mt-1">{{$activitytype->activities_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
