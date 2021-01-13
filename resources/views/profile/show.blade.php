@extends('layouts.app')
@section('content')
<h1 class="mb-8 font-bold pt-10 text-3xl text-teal-400 font-medium">{{ $user->name }}</h1>
<p class="mb-8 font-bold pt-5 text-2xl text-teal-400 font-medium">{{ $user->email }}</p>

@endsection