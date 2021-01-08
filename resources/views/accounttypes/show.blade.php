@extends ('layouts.app')
@section('content')

<div class="container">
<h2>{{$accountType->type}}</h2>

@livewire('account-table', ['accounttype'=>$accounttype])

@endsection
