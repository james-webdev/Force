@extends ('layouts.app')
@section('content')
<div x-data="{showDeleteModal:false}" x-bind:class="{ 'model-open': showDeleteModal }"> 
    @php $route = route('account.destroy', $account->id) @endphp
    @include('partials.confirm')
   <h1 class="mb-8 font-bold pt-10 text-3xl text-teal-400 font-medium">{{ $account->name }}</h1>
   @if(auth()->user()->id == $account->user_id)
   <p>
        <a href="{{route('account.edit', $account->id)}}" 
            title="Edit {{$account->name}}"><i class="far fa-edit text-blue-500"></i>

        </a>
        ||
   
        <a  class="fas fa-trash-alt text-red-800" 
        @click={showDeleteModal=true} 
        title ="Delete {{$account->name}}" 
        class="far fa-trash-open"></a>
 
   
   @endif
    <p class="p-1">
        <span class=" font-bold  p-1 text-lg text-grey-darkest">Google Drive:</span>
            <a href="{{ $account->drive}}" target="_blank">{{$account->drive}}</a>
    </p>

    <p class="p-1"><span class=" font-bold  p-1 text-lg text-grey-darkest">Phone:</span>
            {{ $account->phone}}
    </p>
    <p class="p-1">
        <span class=" font-bold  p-1 text-lg text-grey-darkest">Address:</span>
        {{ $account->fullAddress()}}
    </p>
    <p class="p-1"> <span class="font-bold  p-1 text-lg text-grey-darkest">Account Owner:</span>
            {{$account->owner ? $account->owner->name : ''}}
    </p>
    <p class="p-1">
        <span class=" font-bold  p-1 text-lg text-grey-darkest">Total Business:</span>
                ${{number_format($account->closed_business)}}
    </p>
    <p class="p-1">
        <span class=" font-bold  p-1 text-lg text-grey-darkest">Total Opportunities:</span>
                {{$account->opportunities_count}}
    </p>
     <p class="p-1">
        <span class=" font-bold  p-1 text-lg text-grey-darkest">Won Opportunities:</span>
                {{$account->won_opportunities_count}}
    </p>


    @livewire('contact-table', ['account'=>$account->id])


    @livewire('activity-table', ['account'=>$account->id])

    @livewire('opportunities-table', ['account_id'=>$account->id])
</p>
</div>
@endsection
