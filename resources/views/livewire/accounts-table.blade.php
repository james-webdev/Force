<div>

<div class="ml-24 mt-7 mr-24">

        <h2 class="text-lg text-teal-400 p-5 hover:text-teal-500 leading-tight">
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



        </div>
        <div class="mr-8">
            <button
                wire:click="create()"
                class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                Create New Account
            </button>
        </div>
</div>
    <div class="p-3 flex text-md border border-gray-200 items-center rounded bg-gray-100 shadow-sm mt-1">
                <div class="col m-1 form-inline">
                    <label class="font-bold" for="status">Owner: &nbsp; ↓</label>
                    <select wire:model="user_id"
                    class="form-control rounded p-1 appearance-none">
                        <option value="All">All</option>
                        @foreach ($users as $sf_id=>$user)
                            <option value={{$sf_id}} class="p-3" >{{$user}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col m-1 form-inline">
                    <label class="font-bold" for="status">Industry: &nbsp; ↓</label>
                    <select wire:model="industry_id"
                    class="form-control rounded-sm p-1 appearance-none">
                        <option value="All">All</option>
                        @foreach ($industries as $id=>$industry)
                            <option value={{$id}} class="p-3" >{{$industry}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col m-1 form-inline">
                    <label class="font-bold" for="status">Type: &nbsp; ↓</label>
                    <select wire:model="account_type_id"
                    class="form-control rounded-sm p-1 appearance-none">
                        <option value="All">All</option>
                        @foreach ($accounttypes as $id=>$type)
                            <option value={{$id}} class="p-3" >{{$type}}</option>
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
                            <a wire:click.prevent="sortBy('name')" title="sortBy('companyname')" role="button" href="#">
                                Company
                                <!-- @include('livewire.partials._sort-icon', ['field' => 'name']) -->
                            </a>
                </x-thead>
            </th>
            <th>
                <x-thead>
                            <a wire:click.prevent="sortBy('industry_id')" role="button" href="#">
                                Industry
                                <!-- @include('livewire.partials._sort-icon', ['field' => 'industry_id']) -->
                            </a>
                </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('city')" role="button" href="#">
                        City
                        <!-- @include('livewire.partials._sort-icon', ['field' => 'city']) -->
                    </a>
                </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('state')" role="button" href="#">
                        State
                        <!-- @include('livewire.partials._sort-icon', ['field' => 'state']) -->
                    </a>
                </x-thead>
            </th>
            <th>
                 <x-thead>
                    <a wire:click.prevent="sortBy('owner')" role="button" href="#">
                            Owner
                            <!-- @include('livewire.partials._sort-icon', ['field' => 'owner']) -->
                    </a>
                 </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('contacts_count')" role="button" href="#">
                        No. of Contacts
                        <!-- @include('livewire.partials._sort-icon', ['field' => 'contacts_count']) -->
                    </a>
                </x-thead>
            </th>
            <th>
                <x-thead>
                    <a wire:click.prevent="sortBy('open_opportunities_count')" role="button" href="#">
                    No. of Open Opportunities
                        <!-- @include('livewire.partials._sort-icon', ['field' => 'open_opportunities_count']) -->
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
                    <!-- @include('livewire.partials._sort-icon', ['field' => 'closed_business']) -->
                 </x-thead>
            </th>
        </thead>
        <tbody>
            @foreach ($accounts as $account)

            <tr class="bg-white border border-gray-300 border-1">
                <td class="border">
                 <x-tbody>
                    <a href="{{route('account.show', $account->id)}}"
                        class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                        {{$account->name}}
                    </a>
                 </x-tbody>
                </td>
                <td class="border">
                 <x-tbody>
                    @if($account->industry)
                        <a href="{{route('industry.show', $account->industry->id)}}"
                            class="text-teal-400 hover:text-teal-500 no-underline visited:text-purple-600">
                            {{$account->industry->industry}}
                        </a>
                    @endif
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
                    {{$account->owner ? $account->owner->name :''}}
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

