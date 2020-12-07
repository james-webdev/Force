@extends ('layouts.app')
@section('content')
<div class="mb-4">

    <div class="flex items-center h-screen w-full bg-teal-lighter">
        <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-sm md:mx-auto">
            <h1 class="block w-full text-center text-grey-darkest mb-6">Edit Opportunity at {{$opportunity->account->name}}</h1>

            <form class="mb-6" action="{{route('opportunity.store')}}" method="post">
                @csrf
                @include('opportunities.partials._form')
               
                
                
                <button class="block border bg-teal hover:bg-teal-dark text-green uppercase text-lg mx-auto p-4 rounded" type="submit">Edit Opportunity</button>
            </form>
        </div>
    </div>
</div>

@endsection