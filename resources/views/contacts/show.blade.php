@extends('layouts.app')
@section('content')
<h2>{{$contact->name}}</h2>
<p> <a href="{{route('contact.edit', $contact->id)}}"> Edit {{$contact->name}} </a> </p>
<div class="">
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link class="text-teal-400 hover:text-teal-600">contacts</inertia-link>
      <span class="text-teal-400 font-medium">/ {{ $contact->name }}</span>
    </h1>
    <div class="bg-white ml-3 rounded max-w-3xl">
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Name</label>
           {{$contact->name}}
        </div>
         <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">City</label>
            {{$contact->email}}
        </div>
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Phone</label>
            {{$contact->phone}}
        </div>
    </div>
</div>
<p> <a href="{{route('contact.activity', $contact->id)}}"> Add activity </a> </p>
<table>

<thead>
   <th>Date</th>
   <th>Type</th>
   <th>Activity</th>
</thead>
<tbody>
 @foreach ($contact->activities as $activity)
 <tr>
<td>{{$activity->activity_date->format('Y-m-d')}}</td>
<td>{{$activity->type->activity}}</td>
<td>{{$activity->comments}}</td>
 </tr>

 @endforeach
</tbody>
 </table>
@endsection
