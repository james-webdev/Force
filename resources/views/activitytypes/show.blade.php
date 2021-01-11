@extends ('layouts.app')
@section('content')

<div class="container">

@livewire('activity-table', ['activitytype'=>$activitytype->id])

@endsection
