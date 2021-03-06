<div>


<div class="sm:ml-24 mt-7 sm:mr-24 flex flex-col justify-center items-center sm:block">
        <h2 class="text-4xl text-teal-400 p-5 hover:text-teal-500 leading-tight">
            {{$status=='All' ? 'All' : $statuses[$status]}} Opportunities
        </h2>


    @if($isOpen)

        @include('livewire.opportunities.opportunity-create')

    @endif

   <div class="sm:flex sm:justify-between mt-5 sm:items-center">
        <div class="">
            <div class="sm:m-8">
                <div class="input-group-prepend">
                <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->

                    <input wire:model="search" class="p-2 sm:w-96 form-control rounded border border-gray-200" type="text" placeholder="Search opportunities...">
                </div>
            </div>


        </div>
        <div class="sm:mr-8 mt-4 sm:mt-0 flex justify-center items-center">
            <button
                wire:click="createOpportunity()"
                class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold sm:mr-5 mb-5 py-2 px-4 rounded my-3">
                Create New Opportunity
            </button>
        </div>
   </div>
           <div class="p-3 w-full sm:flex sm:justify-between text-md border border-gray-200 sm:items-center rounded bg-gray-100 shadow-sm mt-1">
                <div class="flex justify-center items-center m-1 form-inline">
                    <label class="font-bold" for="status">Owner: &nbsp; ↓</label>
                    <select wire:model="user_id"
                    class=" w-48 form-control rounded-sm p-1 appearance-none">
                        <option value="All">All</option>
                        @foreach ($users as $id=>$user)
                            <option value="{{$id}}" class="p-3" >{{$user}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex justify-center items-center m-1 form-inline">
                    <label class="font-bold" for="status">Status: &nbsp; ↓</label>
                    <select wire:model="status"
                    class="w-48 form-control rounded-sm p-1 appearance-none">
                        <option value="All">All</option>
                        @foreach ($statuses as $key=>$oppty_status)
                            <option value="{{$key}}" class="p-3" >{{$oppty_status}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex justify-center items-center m-1 form-inline">
                    <label class="font-bold" for="status">Stage: &nbsp; ↓</label>
                    <select wire:model="stage_id"
                    class="w-48 form-control rounded-sm p-1 appearance-none">
                        <option value="All">All</option>
                        @foreach ($stages as $key=>$stage)
                            <option value="{{$key}}" class="p-3" >{{$stage}}</option>
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
            <th>
             <x-thead>
                <a wire:click.prevent="sortBy('account')" role="button" href="#">
                    Company
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'account']) -->
                </a>
             </x-thead>
            </th>
            <th>
             <x-thead>
                <a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Opportunity
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'title']) -->
                </a>
              </x-thead>
            </th>
            <th class="hidden sm:table-cell">
             <x-thead>
                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    Owner
                    <!-- @include('livewire.partials._sort-icon', ['field'=>'user_id']) -->
                </a>
              </x-thead>
            </th>

            <th class="hidden sm:table-cell">
             <x-thead>
                <a wire:click.prevent="sortBy('value')" role="button" href="#">
                    Value
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'value']) -->
                </a>
              </x-thead>
            </th>
            <th class="hidden sm:table-cell">
             <x-thead>
                <a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'status']) -->
                </a>
              </x-thead>
            </th>
            <th class="hidden sm:table-cell">
             <x-thead>
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Created
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'created_at']) -->
                </a>
              </x-thead>
            </th>
            <th class="hidden sm:table-cell">
             <x-thead>
                <a wire:click.prevent="sortBy('expected_close')" role="button" href="#">
                    Close Date
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'expected_close']) -->
                </a>
              </x-thead>
            </th>
            <th class="hidden sm:table-cell">
             <x-thead>Last Activity
             </x-thead>
            </th>
        </thead>
        <tbody>
        @foreach ($opportunities as $opportunity)

            <tr class="bg-white border border-gray-300 border-1">
               <td class="border">
                <x-tbody>
                    <a href="{{route('account.show', $opportunity->account_id)}}"
                    class=" text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$opportunity->account->name}}
                    </a>
                 </x-tbody>
                </td>
               <td class="border border-gray-200">
                    <x-tbody>
                        <a href="{{route('opportunity.show', $opportunity->id)}}"
                        class=" text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$opportunity->title}}
                        </a>
                    </x-tbody>
               </td>
               <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                        {{$opportunity->owner ? $opportunity->owner->name : ''}}
                    </x-tbody>
               </td>
               <td class="border border-gray-200 hidden sm:table-cell">
                   <x-tbody>
                        ${{number_format($opportunity->opportunityValue(),0)}}
                    </x-tbody>
               </td>
               <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                    {{$statuses[$opportunity->status]}}
                    </x-tbody>
                </td>
               <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                    {{$opportunity->created_at->format('Y-m-d')}}
                    </x-tbody>
                </td>
               <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                            {{$opportunity->close_date->format('Y-m-d')}}
                    </x-tbody>
                </td>
                <td class="border border-gray-200 hidden sm:table-cell">
                    <x-tbody>
                        @if($opportunity->contact && $opportunity->contact->lastActivity)
                        {{$opportunity->contact->lastActivity->activity_date}}
                        @endif
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
                        {{ $opportunities->links() }}
                    </div>
            </div>


        </div>
</div>
