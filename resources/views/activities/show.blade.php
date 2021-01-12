@extends ('layouts.app')
@section('content')
 @if($activity->account)
<p class="font-black p-1">Account:
    <a href="{{route('account.show', $activity->account_id)}}"
    class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600"
    >
        {{$activity->account ? $activity->account->name : ''}}
    </a>
</p>
@endif
@if($activity->contact)
<p class="font-black p-1">Contact:
    <a href="{{route('contact.show', $activity->contact->id)}}"
    class="text-teal-600 hover:text-teal-800 underline visited:text-purple-600">
        {{$activity->contact->fullName()}}
    </a>
</p>
@endif
<p class="p-1"> Activity Date: {{$activity->activity_date}}</p>
<p class="p-1">Status: {{$activity->status ==1 ? 'Completed' : 'To Do'}}</p>

<p class="p-1">Owner: {{$activity->owner ? $activity->owner->name : ''}}</p>
<p class="p-1">Subject: {{$activity->subject}}</p>
<p class="p-1">Details: {!!$activity->details!!}</p>
@endsection
