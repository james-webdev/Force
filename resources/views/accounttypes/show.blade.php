@extends ('layouts.app')
@section('content')
   
<div class="container">
<h2>{{$accounttype->type}}</h2>

@livewire('account-table', ['accounttype'=>$accounttype])

@endsection