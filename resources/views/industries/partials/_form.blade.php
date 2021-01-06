<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

    <div class="">

        <div class="mb-4">

            <label for="industry" 
                class="block text-gray-700 text-sm font-bold mb-2">Industry:</label>

            <input type="text" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="industry" 
                placeholder="Industry" 
                value="{{$industry ? $industry->$industry : ''}}"
                />
            

            @error('industry') <span class="text-red-500"></span>@enderror

        </div>
    </div>
</div>