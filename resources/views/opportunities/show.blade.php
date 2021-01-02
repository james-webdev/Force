@extends ('layouts.app')
@section('content')

   <h1 class="mb-2 font-bold text-3xl text-teal-400 font-medium">{{ $opportunity->title }}</h1>
   <h2 class="font-bold text-2xl text-teal-400 font-medium">
        <a href="{{route('account.show', $opportunity->account_id)}}"
            class="hover:text-teal-800 underline visited:text-purple-600">
        {{$opportunity->account->name}}
    </a>
    </h2>
    
    <p>
        <span class="font-bold text-lg text-grey-darkest">
            Status:
        </span>
        {{ $statuses[$opportunity->status]}}
    </p>

    <p>
        <span class=" font-bold text-lg text-grey-darkest">
            Stage:
        </span>
        {{ $opportunity->stage->stage}}
    </p>

    <p>
        <span class=" font-bold text-lg text-grey-darkest">
            Date Opened
        </span>
        
        {{ $opportunity->created_at->format('Y-m-d')}}
    </p>

    <p>
        <span class=" font-bold text-lg text-grey-darkest">
            Date Closed:
        </span>
        {{ $opportunity->close_date->format('Y-m-d')}}
    </p>

    <p>
        <span class=" font-bold text-lg text-grey-darkest">
            Value:
        </span>
        ${{number_format($opportunity->value, 0)}}
    </p>

    <p>
        <span class=" font-bold text-lg text-grey-darkest">
            Owner:
        </span>
        {{ $opportunity->owner->name}}
    </p>

        
@endsection