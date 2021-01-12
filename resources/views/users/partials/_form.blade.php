<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

    <div class="">

        <div class="mb-4">

            <label for="type" 
                class="block text-gray-700 text-sm font-bold mb-2">Name:</label>

            <input type="text" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="type" 
                placeholder="Account Type" 
                value="{{$accounttype ? $accounttype->$type : ''}}"
                />
            

            @error('type') <span class="text-red-500"></span>@enderror

        </div>
    </div>
</div>