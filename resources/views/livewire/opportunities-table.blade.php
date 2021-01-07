<div>


<div class="ml-24 mr-24">
<h2 class="text-4xl text-teal-400 p-5 hover:text-teal-500 leading-tight">
            Opportunities
        </h2>


    @if($isOpportunityOpen)

        @include('livewire.opportunity-create')

    @endif

   <div class="flex justify-between mt-5 items-center">
        <div class="flex justify-left items-center">
            <div class="col m-8">
                <div class="input-group-prepend">
                <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->

                    <input wire:model="search" class="p-2 w-96 form-control rounded border border-gray-200" type="text" placeholder="Search opportunities...">
                </div>
            </div>


            <div class="p-3 mt-1">
                @include('livewire.partials._perpage')
                <div class="col form-inline">
                    <label class="font-bold" for="status">Owner: &nbsp; ↓</label>
                    <select wire:model="user_id"
                    class="form-control p-1 appearance-none">
                        <option value="All">All</option>
                        @foreach ($users as $sf_id=>$user)
                            <option value={{$sf_id}} class="p-3" >{{$user}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
        <div class="mr-8">
            <button
                wire:click="createOpportunity()"
                class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                Create New Opportunity
            </button>
        </div>
</div>
</div>
<table  class="table-fixed">
        <thead class="bg-teal-300">
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('account')" role="button" href="#">
                    Company
                    @include('livewire.partials._sort-icon', ['field' => 'account'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Opportunity
                    @include('livewire.partials._sort-icon', ['field' => 'title'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    Owner
                    @include('livewire.partials._sort-icon', ['field'=>'user_id'])
                </a>
            </th>

            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('value')" role="button" href="#">
                    Value
                    @include('livewire.partials._sort-icon', ['field' => 'value'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    @include('livewire.partials._sort-icon', ['field' => 'status'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Created
                    @include('livewire.partials._sort-icon', ['field' => 'created_at'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Close Date
                    @include('livewire.partials._sort-icon', ['field' => 'expected_close'])
                </a>
            </th>
            <th class="w-1/8 px-4 border-collapse border border-teal-800">Last Activity</th>
        </thead>
        <tbody>
        @foreach ($opportunities as $opportunity)

            <tr>
               <td class="px-4 border-collapse border border-teal-800">
                    <a href="{{route('account.show', $opportunity->account_id)}}"
                         class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                        {{$opportunity->account->name}}
                    </a>
                </td>
               <td class="px-4 border-collapse border border-teal-800">
                <a href="{{route('opportunity.show', $opportunity->id)}}"
                     class=" text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
                {{$opportunity->title}}
            </a>
            </td>
               <td class="px-4 border-collapse border border-teal-800">
                {{$opportunity->owner->name}}</td>

               <td class="px-4 text-right border-collapse border border-teal-800">
                    ${{number_format($opportunity->opportunityValue(),0)}}
               </td>
               <td class="px-4 border-collapse border border-teal-800">{{$statuses[$opportunity->status]}}</td>
               <td class="px-4 border-collapse border border-teal-800">{{$opportunity->created_at->format('Y-m-d')}}</td>
               <td class="px-4 border-collapse border border-teal-800">
                        {{$opportunity->close_date->format('Y-m-d')}}
                </td>
                <td class="px-4 border-collapse border border-teal-800">
                    @if($opportunity->contact && $opportunity->contact->lastActivity)
                    {{$opportunity->contact->lastActivity->activity_date}}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

    <div class="row mb-4">
            <div class="row-start-4 text-left">
                {{ $opportunities->links() }}
            </div>



    </div>
</div>
