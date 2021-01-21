@if (session()->has('message'))
  <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
      
        <button
          class="opacity-75 cursor-pointer absolute top-0 right-0 py-2 px-3 hover:opacity-100"
        >
          ×
        </button>
        <div class="flex items-center">
           {{ session('message') }}
        </div>
      </div>
  @elseif (session()->has('error'))
  <div class="p-3 bg-red-300 text-red-800 rounded shadow-sm">
      
        <button
          class="opacity-75 cursor-pointer absolute top-0 right-0 py-2 px-3 hover:opacity-100"
        >
          ×
        </button>
        <div class="flex items-center">
           {{ session('error') }}
        </div>
      </div>



  @endif