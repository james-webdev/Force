@extends ('layouts.app')
@section('content')

   <h1 class="mb-8 font-bold pt-10 text-3xl text-teal-400 font-medium">{{ $account->name }}</h1>
   @if(auth()->user()->id == $account->user_id)
   <p>
        <a href="{{route('account.edit', $account->id)}}" 
            title="Edit {{$account->name}}">
            Edit {{$account->name}}
        </a>
    </p>
   <p>Delete {{$account->name}}</p>
   @endif


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
@endsection
