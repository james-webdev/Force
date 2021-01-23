@extends('layouts.app')
@section('content')
<h2>Edit {{$account->name}}</h2>
<form 
method="post"
action = "{{route('account.update', $account->id)}}">
@csrf
@method('put')
@include('accounts.partials._form')
<input type="submit" value="Edit {{$account->name}}" />
</form>
@endsection