<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

    <div class="">

        <div class="mb-4">

            <label for="Name"
                class="block text-gray-700 text-sm font-bold mb-2">Name:</label>

            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name"
                name="name"
                required
                placeholder="Company Name"
                wire:model="name"
                value="{{isset($account) ? $account->name : ''}}">

                @error('name') <span class="text-red-500"></span>@enderror

        </div>

        <div class="mb-4">

            <label for="street"
                class="block text-gray-700 text-sm font-bold mb-2">Street:</label>

            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="street"
                placeholder="Street address"
                wire:model="street"
                name="street"
                value="{{isset($account) ? $account->street : ''}}">
                @error('street') <span class="text-red-500"></span>@enderror

        </div>
        <div class="mb-4">

            <label for="city"
                class="block text-gray-700 text-sm font-bold mb-2">City:</label>

            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="city"
                placeholder="City"
                wire:model="city"
                name="city"
                value="{{isset($account) ? $account->city : ''}}">
                @error('city') <span class="text-red-500"></span>@enderror

        </div>

        <div class="mb-4">

            <label for="state"
                class="block text-gray-700 text-sm font-bold mb-2">Street:</label>

            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="state"
                placeholder="State code"
                wire:model="state"
                name="state"
                value="{{isset($account) ? $account->state : ''}}">

                @error('state') <span class="text-red-500"></span>@enderror

        </div>
        <div class="mb-4">

            <label for="postalcode"
                class="block text-gray-700 text-sm font-bold mb-2">Post code:</label>

            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="postalcode"
                placeholder="Postal code"
                wire:model="postalcode"
                name="postalcode"
                value="{{isset($account) ? $account->postalcode : ''}}">

                @error('street') <span class="text-red-500"></span>@enderror

        </div>

        <div class="mb-4">

            <label for="description"
             class="block text-gray-700 text-sm font-bold mb-2">Description:</label>

            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                name="description"
                wire:model="description"
                placeholder="Enter Body"
                >{{isset($account) ? $account->description : ''}}</textarea>

            @error('description') <span class="text-red-500"></span>@enderror

        </div>
        <div class="mb-4">

            <label for="Industry"
             class="block text-gray-700 text-sm font-bold mb-2">Industry:</label>

            <select
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                wire:model="industry_id"
                placeholder="Select industry"
                name="industry_id">
                @foreach ($industries as $key=>$value)
                    @if(isset($account) && $account->industry_id == $key)
                    <option selected value="{{$key}}">{{$value}}</option>
                    @else
                    <option value="{{$key}}">{{$value}}</option>
                    @endif
                
                @endforeach
            </select>

            @error('industry_id') <span class="text-red-500"></span>@enderror

        </div>

        <div class="mb-4">

            <label for="Type"
             class="block text-gray-700 text-sm font-bold mb-2">Source:</label>

            <select
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                wire:model="account_type_id"
                placeholder="Select account type"
                name="account_type_id"
                >
                @foreach ($accounttypes as $key=>$value)
                    @if(isset($account) && $account->account_type_id == $key)
                        <option selected value="{{$key}}">{{$value}}</option>
                    @else
                        <option value="{{$key}}">{{$value}}</option>
                    @endif
                @endforeach
            </select>

            @error('account_type_id') <span class="text-red-500"></span>@enderror

        </div>

    </div>

</div>