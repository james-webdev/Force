<div>

<div class="ml-24 mt-7 mr-24">
    <h2 class="text-4xl mt-7 text-teal-400 p-5 hover:text-teal-500 leading-tight">
            <!-- <i class="fas fa-exclamation"></i> -->
             Activities
    </h2>
   
    @if($isOpen)

    @include('livewire.activities.activity-create')

    @endif

<div class="flex justify-between mt-5 items-center">

        <div class="flex justify-left items-center">
            @component('livewire.partials._search')
                @slot('placeholder')
                    Search activities
                @endslot
            @endcomponent
        </div>

    <div class="mr-8">
        <button
            wire:click="createActivity()"
            class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3"
            >
            Create New Activity
        </button>
    </div>
</div>

    <div class="p-3 flex justify-between text-md border border-gray-200 items-center rounded bg-gray-100 shadow-sm mt-1">
        @include(('livewire.partials._ownerselector'))
        <div class="col m-1 form-inline">
            <label class="font-bold" for="status">Type: &nbsp; ↓</label>
            <select wire:model="activity_type_id"
            class="form-control appearance-none rounded-sm p-1">
                <option value="All">All</option>
                @foreach ($types as $id=>$activity)
                    <option value={{$id}} >{{$activity}}</option>
                @endforeach

            </select>
        </div>
        @include('livewire.partials._perpage')
    </div>
    </div>


    <div class="w-3/4 m-auto mt-10">
        <table class="table-fixed shadow-md">
            <thead class="bg-teal-100">
                <th>
                    <x-thead>
                        <a wire:click.prevent="sortBy('activity_date')" role="button" href="#">
                        Activity Date
                        <!-- @include('livewire.partials._sort-icon', ['field' => 'activity_date']) -->
                    </x-thead>
                    </a>
                </th>
                <th>
                  <x-thead>
                   Type
                  </x-thead>
                </th>
                <th>
                  <x-thead>
                   Subject
                  </x-thead>
                </th>
                <th>
                  <x-thead>
                   Contact
                  </x-thead>
                </th>
                <th>
                  <x-thead>
                   Company
                  </x-thead>
                </th>
                <th>
                  <x-thead>
                   Owner
                  </x-thead>
                </th>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr class="bg-white border rounded border-gray-300 border-1">
                    <td class="border border-gray-200">
                     <x-tbody>
                      <a href="{{route('activity.show', $activity->id)}}"
                      class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600"
                        >
                        {{$activity->activity_date}}
                        </a>
                     </x-tbody>
                    </td>
                    <td class="border border-gray-200">
                    <x-tbody>
                        <a href="{{route('activity.show', $activity->id)}}"
                        class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600"
                        >
                        {{$activity->type->activity}}
                        </a>
                     </x-tbody>
                    </td>
                    <td class="border border-gray-200">
                        <x-tbody>
                        {{$activity->subject}}
                        </x-tbody>
                    </td>

                    <td class="border border-gray-200">
                    <x-tbody>
                        @if($activity->contact)
                        <a href="{{route('contact.show', $activity->contact_id)}}"
                        class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                            {{$activity->contact->fullName()}}
                        </a>
                        @endif
                     </x-tbody>
                    </td>
                    <td class="border border-gray-200">
                    <x-tbody>
                        @if($activity->account)
                            <a href="{{route('account.show', $activity->account_id)}}"
                            class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                                {{$activity->account->name}}
                            </a>
                        @endif
                      </x-tbody>
                    </td>
                    <td class="border border-gray-200">
                        <x-tbody>
                        {{$activity->owner ? $activity->owner->name : ''}}
                        </x-tbody>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="row mt-28">
            <div class="row-start-4 text-left">
                {{ $activities->links() }}
            </div>



    </div>
</div>
