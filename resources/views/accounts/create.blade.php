@extends('layouts.app')
@section('content')
<h2>Create Account</h2>
<form 
method="post"
action = "{{route('account.store')}}">
@csrf

@include('accounts.partials._form')
<input type="submit" value="Create Account" />
</form>
@endsection