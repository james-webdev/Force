<div>

<div class="ml-24 mr-24">

        <h2 class="text-4xl text-teal-400 p-5 hover:text-teal-500 leading-tight">
            Accounts
        </h2>


    @if($isOpen)

        @include('livewire.accounts-create')

    @endif

   <div class="flex justify-between mt-5 items-center">
        <div class="flex justify-left items-center">
            <div class="col m-8">
                <div class="input-group-prepend">
                <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->

                    <input wire:model="search" class="p-2 w-96 form-control rounded border border-gray-200" type="text" placeholder="Search accounts...">
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
                wire:click="create()"
                class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                Create New Account
            </button>
        </div>
</div>
</div>

<div class="w-3/4 m-auto mt-10">
      <table class="table-fixed shadow-md">
        <thead class="bg-teal-100">
            <th>
                <x-thead>
                            <a wire:click.prevent="sortBy('name')" role="button" href="#">
                                Company
                                @include('livewire.partials._sort-icon', ['field' => 'name'])
                            </a>
                </x-thead>
            </th>

            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('city')" role="button" href="#">
                        City
                        @include('livewire.partials._sort-icon', ['field' => 'city'])
                    </a>
                </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('state')" role="button" href="#">
                        State
                        @include('livewire.partials._sort-icon', ['field' => 'state'])
                    </a>
                </x-thead>
            </th>
            <th>
                 <x-thead>
                    <a wire:click.prevent="sortBy('owner')" role="button" href="#">
                            Owner
                            @include('livewire.partials._sort-icon', ['field' => 'owner'])
                    </a>
                 </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('contacts_count')" role="button" href="#">
                        # Contacts
                        @include('livewire.partials._sort-icon', ['field' => 'contacts_count'])
                    </a>
                </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('open_opportunities_count')" role="button" href="#">
                        # Open Opportunities
                        @include('livewire.partials._sort-icon', ['field' => 'open_opportunities_count'])
                    </a>
                </x-thead>
            </th>
            <th>
                <x-thead>
                    Last Activity Date
                </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('closed_business')" role="button" href="#">
                    Total Business
                    @include('livewire.partials._sort-icon', ['field' => 'closed_business'])
                 </x-thead>
            </th>
        </thead>
        <tbody>
            @foreach ($accounts as $account)

            <tr class="bg-white border border-gray-300 border-1">
                <td class="border">
                <x-tbody>
                    <a href="{{route('account.show', $account->id)}}"
                        class=" text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$account->name}}
                    </a>
                    </x-tbody>
                </td>
                <td class="border border-gray-200">
                <x-tbody>
                    {{$account->city}}
                    </x-tbody>
                </td>
                <td class="border border-gray-200">
                <x-tbody>
                    {{$account->state}}
                    </x-tbody>
                </td>
                <td class="border border-gray-200">
                <x-tbody>
                    {{$account->owner->name}}
                    </x-tbody>
                </td>

                <td class="border border-gray-200">
                <x-tbody>
                    {{$account->contacts_count}}
                    </x-tbody>
                </td>
                <td class="border border-gray-200">
                <x-tbody>
                    {{$account->open_opportunities_count}}
                    </x-tbody>
                </td>
                <td class="border border-gray-200">
                <x-tbody>
                    @if ($account->lastActivity)
                        {{$account->lastActivity->activity_date}}
                    @endif
                    </x-tbody>
                </td>
                <td class="border border-gray-200">
                <x-tbody>
                        ${{number_format($account->closed_business,0)}}
                </x-tbody>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="row mt-28">
            <div class="row-start-4 text-left">
                {{ $accounts->links() }}
            </div>



    </div>
</div>

