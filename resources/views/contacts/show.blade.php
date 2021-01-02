@extends('layouts.app')
@section('content')
<h1 class="mb-2 font-bold text-3xl text-teal-400 font-medium">
  {{$contact->fullName()}}
</h1>
<h2  class="mb-4 font-bold text-2xl text-teal-400 font-medium">
  @if($contact->company)
    <a href="{{route('account.show', $contact->company->id)}}" 
      class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
        {{$contact->company->name}}
    </a>
  @endif
</h2>
<p>
  <a href="{{route('contact.edit', $contact->id)}}">
  <i class="text-teal-400 hover:text-teal-600 far fa-edit"></i> Edit {{$contact->name}} </a> </p>

    
    <div class="bg-white ml-3 rounded max-w-3xl">
        
      <p> <span class="font-black">Email:</span>{{$contact->email}}</p>
      <p> <span class="font-black">Phone:</span>{{$contact->phone}}</p>

</div>
     
    @livewire('activity-table', ['contact'=>$contact->id])
@endsection