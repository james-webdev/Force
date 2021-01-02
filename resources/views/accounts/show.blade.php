@extends ('layouts.app')
@section('content')

   <h1 class="mb-8 font-bold text-3xl text-teal-400 font-medium">{{ $account->name }}</h1>

    <p><span class=" font-bold text-lg text-grey-darkest">Phone:</span>
            {{ $account->phone}}
    </p>
    <p>
        <span class=" font-bold text-lg text-grey-darkest">Address:</span>
        {{ $account->fullAddress()}}
    </p>
    <p> <span class=" font-bold text-lg text-grey-darkest">Account Owner:</span>
            {{ $account->owner->name}}
    </p>
    <p>    
        <span class=" font-bold text-lg text-grey-darkest">Total Business:</span>
                ${{number_format($account->closed_business)}}
    </p>
    <p>    
        <span class=" font-bold text-lg text-grey-darkest">Total Opportunities:</span>
                {{$account->opportunities_count}}
    </p>
     <p>    
        <span class=" font-bold text-lg text-grey-darkest">Won Opportunities:</span>
                {{$account->won_opportunities_count}}
    </p>
   
  
    </p>
    @livewire('contact-table', ['account'=>$account->id])
    

    @livewire('activity-table', ['account'=>$account->id])

    @livewire('opportunities-table', ['account_id'=>$account->id])
@endsection