@extends ('layouts.app')
@section('content')
 @if($activity->account)
<p class="font-black">Account: 
    <a href="{{route('account.show', $activity->account_id)}}"
    class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600"
    >
        {{$activity->account ? $activity->account->name : ''}}
    </a>
</p>
@endif
@if($activity->contact)
<p class="font-black">Contact: 
    <a href="{{route('contact.show', $activity->contact->id)}}"
    class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
        {{$activity->contact->fullName()}}
    </a>
</p>
@endif
<p>Activity Date: {{$activity->activity_date}}</p>
<p>Status: {{$activity->status ==1 ? 'Completed' : 'To Do'}}</p>

<p>Owner: {{$activity->owner ? $activity->owner->name : ''}}</p>
<p>Subject:{{$activity->subject}}</p>
<p>Details:{!!$activity->details!!}</p>
@endsection