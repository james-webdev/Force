@extends('layouts.app')

@section('content')

<div  class="bg-white ml-3 rounded max-w-3xl">
      <form class="p-10" method="POST" action="{{route('activity.store')}}">
      @csrf()
        <label class="mb-2 font-bold text-lg text-grey-darkest" for="account">Activity Type</label>

                    <select class="border py-2 px-3 text-grey-800 w-full" name="activitytype_id">
     @foreach($activitytypes as $type)
                    <option value="{{$type->id}}">{{$type->activity}} </option>
     @endforeach
                    </select>
        <input type="hidden" name="contact_id" value="{{$contact->id}}"/>
        <div class="flex flex-col mb-4">
           <textarea name="comments" class="border rounded mt-2 py-2 px-3 text-grey-800 w-full" placeholder="comments"></textarea>
        </div>
        <div class="px-8 py-4 border-gray-200 flex items-center">

          <input type="submit" value="Add Activity" class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15"/>
        </div>
      </form>
    </div>
@endsection


