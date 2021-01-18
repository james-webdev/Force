<div>

    <div class="flex justify-between">

        <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500 leading-tight">Activity Types</h2>

        @if($isOpen)

            @include('livewire.activitytypes-create')

        @endif


        <div class="">
            <button
                wire:click="create()"
                class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                Create New Activity Type
            </button>
        </div>
    </div>


  <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
    @include('livewire.partials._search', ['placeholder'=>'Search Activity Types'])
    <table  class="table-fixed mt-2">
        <thead class="bg-teal-100">
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
         <th></th>
        <th></th>

        </thead>
        <tbody>
            @foreach ($activitytypes as $activitytype)
            <tr>
                <td class="text-left p-1">
                    <a href="{{route('activitytype.show', $activitytype->id)}}">{{$activitytype->activity}}</a></td>
                <td class="text-center mt-1">{{$activitytype->activities_count}}</td>
                <td class="p-3">
                    <button class="text-xs bg-gray-300 hover:bg-teal-300 text-teal t-teal-100 font-bold p-1 ml-1 mb-3 rounded">
                        <i class="far fa-edit">
                       </i>
                    </button>
                </td>
                <td class="p-3">
                    <button method="delete" class="text-xs bg-gray-300 hover:bg-teal-800 text-teal-700 hover:text-teal-100 font-bold p-1 ml-1 mb-3 rounded">
                        <i class="far fa-trash-alt">
                        </i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>