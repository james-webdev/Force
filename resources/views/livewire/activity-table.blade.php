<div>
    <h4 class="mt-4 mb-2 font-bold text-xl text-teal-400 font-medium">
            <i class="fas fa-exclamation"></i> Activities
    </h4>
    @component('livewire.partials._search')
        @slot('placeholder')
            Search activities
        @endslot
    @endcomponent


    <div class="row mb-4">
        @include('livewire.partials._perpage')
        <div class="col form-inline">
        @include(('livewire.partials._ownerselector'))
        
            <label class="font-bold" for="status">Type:</label>
            <select wire:model="activity_type_id"
            class="form-control">
                <option value="All">All</option>
                @foreach ($types as $id=>$activity)
                    <option value={{$id}} >{{$activity}}</option>
                @endforeach

            </select>
        </div>
    </div>
    <a
        wire:click="createActivity()"
        class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600"
        ><i class="text-teal-400  fas fa-plus-circle"></i>
        Create New Activity</a>

    @if($isActivityOpen)

        @include('livewire.activity-create')

    @endif
    <div>
        <table class="table-fixed px-4 border-collapse border border-teal-800">
            <thead class="bg-teal-300">
                <th class="px-4 border-collapse border border-teal-800">
                    <a wire:click.prevent="sortBy('activity_date')" role="button" href="#">
                    Activity Date
                    @include('livewire.partials._sort-icon', ['field' => 'activity_date'])
                </a>

                </th>
                <th class="px-4 border-collapse border border-teal-800">Type</th>
                <th class="px-4 border-collapse border border-teal-800">Subject</th>
                <th class="px-4 border-collapse border border-teal-800">Contact</th>
                <th class="px-4 border-collapse border border-teal-800">Company</th>
                <th class="px-4 border-collapse border border-teal-800">Owner</th>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr>
                    <td class="px-4 border-collapse border border-teal-800"><a href="{{route('activity.show', $activity->id)}}"
                        class="underline text-teal-600 hover:text-teal-800 visited:text-purple-600"
                        >
                        {{$activity->activity_date}}</a></td>
                    <td class="px-4 border-collapse border border-teal-800">
                        <a href="{{route('activity.show', $activity->id)}}"
                        class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600"
                        >
                        {{$activity->type->activity}}
                        </a>
                    </td>
                    <td class="px-4 border-collapse border border-teal-800">{{$activity->subject}}</td>
                    <td class="px-4 border-collapse border border-teal-800">
                        @if($activity->contact)
                        <a href="{{route('contact.show', $activity->contact_id)}}"
                            class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                            {{$activity->contact->fullName()}}
                        </a>
                        @endif
                    </td>
                    <td class="px-4 border-collapse border border-teal-800">
                        @if($activity->account)
                            <a href="{{route('account.show', $activity->account_id)}}"
                                class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                                {{$activity->account->name}}
                            </a>
                        @endif
                    </td>
                    <td class="px-4 border-collapse border border-teal-800">{{$activity->owner ? $activity->owner->name : ''}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="row mb-4">
            <div class="row-start-4 text-left">
                {{ $activities->links() }}
            </div>



    </div>
</div>
