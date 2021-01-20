<div>

<div class="flex justify-between">
        <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500 leading-tight">Sales Stages</h2>

        @if($isOpen)

        @include('livewire.salesstages.salesstages-create')

        @endif


        <div class="ml-5">
                <button
                    wire:click="create()"
                    class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                    Create New Sales Stage
                </button>
            </div>
    </div>

    <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
    @include('livewire.partials._search', ['placeholder'=>'Search Sales Stages'])
    <table  class="table-fixed mt-2 p-1">
        <thead class="bg-teal-100 p-1">
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
            <th></th>
            <th></th>


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
                <td class="p-3">
                    <button wire:click="edit({{ $stage->id }})" class="text-xs bg-gray-300 hover:bg-teal-300 text-teal t-teal-100 font-bold p-1 ml-1 mb-3 rounded">
                        <i class="far fa-edit">
                       </i>
                    </button>
                </td>
                <td class="p-3">
                @if($confirming===$stage->id)
                    <div class="flex justify-between">
                    <button wire:click="delete({{ $stage->id }})"
                        class="text-xs bg-red-600 hover:bg-red-500 text-white hover:text-black font-bold px-1.5 py-2 rounded"><i class="fas fa-check"></i></i></button>
                        <button wire:click="stopDelete({{ $stage->id }})"
                        class="text-xs px-2 py-2 ml-0.5 bg-green-600 hover:bg-green-400 text-white hover:text-black font-bold rounded"><i class="fas fa-times"></i></i></button>
                    </div>
                    @else
                        <button wire:click="confirmDelete({{ $stage->id }})"
                           class="text-xs bg-gray-300 hover:bg-teal-800 text-teal-700 hover:text-teal-100 font-bold p-1 ml-1 mb-3 rounded">
                           <i class="far fa-trash-alt"></i></button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

