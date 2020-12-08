@extends('layouts.app')
@section('content')
<h2 class="font-bold text-teal-400 hover:text-teal-600">
  {{$contact->fullName()}}
</h2>
<h4 class="text-teal-400 ">{{$contact->company->name}}</h4>
<p><a href="{{route('contact.edit', $contact->id)}}">
  <i class="text-teal-400 hover:text-teal-600 far fa-edit"></i> Edit {{$contact->name}} </a> </p>

    
    <div class="bg-white ml-3 rounded max-w-3xl">
        
         <table class="table-fixed">
            <tr>
              <td>Email:</td>
              <td>{{$contact->email}}</td>
            </tr>
        <tr>

              <td>Phone</label>
            <td>{{$contact->phone}}</td>
        </td>
    </table>
</div>
<p>
  <a href="{{route('activity.create', $contact->id)}}">
  <i class="text-teal-400  fas fa-plus-circle"></i> Add Activity</a></p>
    <table class="table-fixed">

      <thead>
         <th>Date</th>
         <th>Type</th>
         <th>Activity</th>
      </thead>
      <tbody>
       @foreach ($contact->activities as $activity)
        <tr>
          <td>{{$activity->activity_date}}</td>
          <td>{{$activity->type->activity}}</td>
          <td>{{$activity->comments}}</td>
        </tr>
       @endforeach
      </tbody>
  </table>
@endsection