<div>


<div class="flex justify-between">
        <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500 leading-tight">Industries</h2>

        @if($isOpen)

        @include('livewire.industries-create')

        @endif


        <div class="">
                <button
                    wire:click="create()"
                    class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                    Create New Industry
                </button>
            </div>
    </div>
  <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
    @include('livewire.partials._search', ['placeholder'=>'Search Industries'])
    <table  class="table-fixed mt-2">
        <thead class="bg-teal-100">
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
         <th></th>
         <th></th>

        </thead>
        <tbody>
            @foreach ($industries as $industry)
            <tr>
                <td class="text-left p-1">
                    <a href="{{route('industry.show', $industry->id)}}">{{$industry->industry}}
                    </a>
                </td>
                <td class="text-center">{{$industry->accounts_count}}
                </td>
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
