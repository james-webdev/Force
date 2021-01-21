<div>


<div class="flex justify-between">

    <h2 class="text-2xl text-teal-400 p-5 hover:text-teal-500 leading-tight">Users</h2>
    @include('livewire.partials._message')
    @if($isOpen)

        @include('livewire.users.users-create')

    @endif


       <div class="mr-8">
            <button
                wire:click="create()"
                class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                Create New User
            </button>
        </div>
</div>

  <div class="text-sm p-1">
    @include('livewire.partials._perPage')
  </div>
  @include('livewire.partials._search', ['placeholder'=>'Search Users'])
    <table  class="table-fixed mt-2">
        <thead class="bg-teal-100">
            <th class="w-1/2">
                <a wire:click.prevent="sortBy('user')" role="button" href="#">
                    Users

                </a>
            </th>
            <th class="w-1/2 text-center">
                 Email
         </th>
            <th class="w-1/2 text-center">
             <a wire:click.prevent="sortBy('accounts_count')" role="button" href="#">
                 No. of Accounts
             </a>
         </th>
         <th></th>
        <th></th>

        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-left p-1">
                    <a href="{{route('users.show', $user->id)}}">{{$user->name}}</a></td>
                <td class="text-left p-1">
                    {{$user->email}}</td>
                <td class="text-center">{{$user->accounts_count}}</td>
                <td class="p-3">
                <button wire:click="edit({{ $user->id }})" class="text-xs bg-gray-300 hover:bg-teal-300 text-teal t-teal-100 font-bold p-1 ml-1 mb-3 rounded">
                        <i class="far fa-edit">
                       </i>
                    </button>
                </td>
                <td class="p-3">
                @if($confirming===$user->id)
                    <div class="flex justify-between">
                    <button wire:click="delete({{ $user->id }})"
                        class="text-xs bg-red-600 hover:bg-gray-400 text-white hover:text-red-600 font-bold px-1.5 py-2 rounded"><i class="fas fa-check"></i></i></button>
                        <button wire:click="stopDelete({{ $user->id }})"
                        class="text-xs px-2 py-2 ml-0.5 bg-green-600 hover:bg-gray-400 text-white hover:text-green-600 font-bold rounded"><i class="fas fa-times"></i></i></button>
                    </div>
                    @else
                        <button wire:click="confirmDelete({{ $user->id }})"
                           class="text-xs bg-gray-300 hover:bg-teal-800 text-teal-700 hover:text-teal-100 font-bold p-1 ml-1 mb-3 rounded">
                           <i class="far fa-trash-alt"></i></button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
