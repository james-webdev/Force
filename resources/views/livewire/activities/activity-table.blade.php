<div>

<div class="sm:ml-24 mt-7 sm:mr-24 flex flex-col justify-center items-center sm:block">
    <h2 class="text-4xl mt-7 text-teal-400 p-5 hover:text-teal-500 leading-tight">
            <!-- <i class="fas fa-exclamation"></i> -->
             Activities
    </h2>

    @if($isOpen)

    @include('livewire.activities.activity-create')

    @endif

    <div class="sm:flex sm:justify-between mt-5 sm:items-center">

            <div class="sm:m-8">
                @component('livewire.partials._search')
                    @slot('placeholder')
                        Search activities 
                    @endslot
                @endcomponent
            </div>

        <div class="sm:mr-8 mt-4 sm:mt-0 flex justify-center items-center">
            <button
                wire:click="createActivity()"
                class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold sm:mr-5 mb-5 py-2 px-4 rounded my-3"
                >
                Create New Activity
            </button>
        </div>
    </div>

    <div class="p-3 w-full sm:flex sm:justify-between text-md border border-gray-200 sm:items-center rounded bg-gray-100 shadow-sm mt-1">
        <div class="flex justify-center items-center m-1 form-inline">
            @include(('livewire.partials._ownerselector'))
        </div>
        <div class="flex justify-center items-center m-1 form-inline">
            <label class="font-bold" for="status">Type: &nbsp; ↓</label>
            <select wire:model="activity_type_id"
            class="w-48 form-control appearance-none rounded-sm p-1">
                <option value="All">All</option>
                @foreach ($types as $id=>$activity)
                    <option value={{$id}} >{{$activity}}</option>
                @endforeach

            </select>
        </div>
        <div class="flex justify-center">
            @include('livewire.partials._perpage')
        </div>
    </div>
    </div>


    <div class="sm:w-3/4 flex justify-center items-center w-3/5 m-auto mt-10">
        <table class="table-fixed shadow-md">
            <thead class="bg-teal-100">
                <th class="hidden sm:table-cell">
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
                <th class="hidden sm:table-cell">
                  <x-thead>
                   Contact
                  </x-thead>
                </th>
                <th class="hidden sm:table-cell">
                  <x-thead>
                   Company
                  </x-thead>
                </th>
                <th class="hidden sm:table-cell">
                  <x-thead>
                   Owner
                  </x-thead>
                </th>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr class="bg-white border rounded border-gray-300 border-1">
                    <td class="border border-gray-200 hidden sm:table-cell">
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

                    <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                        @if($activity->contact)
                        <a href="{{route('contact.show', $activity->contact_id)}}"
                        class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                            {{$activity->contact->fullName()}}
                        </a>
                        @endif
                     </x-tbody>
                    </td>
                    <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                        @if($activity->account)
                            <a href="{{route('account.show', $activity->account_id)}}"
                            class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                                {{$activity->account->name}}
                            </a>
                        @endif
                      </x-tbody>
                    </td>
                    <td class="border border-gray-200 hidden sm:table-cell">
                        <x-tbody>
                        {{$activity->owner ? $activity->owner->name : ''}}
                        </x-tbody>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="flex justify-center items-center sm:block">

            <div class="row mt-28">
                    <div class="row-start-4 text-left">
                        {{ $activities->links() }}
                    </div>
            </div>

    </div>
</div>
