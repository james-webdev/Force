@extends ('layouts.app')
@section('content')

<div class="container">
<h2>{{$accountType->type}}</h2>

<p>There are {{$accountType->accounts_count}} accounts in this type.</p>
</div>


@endsection
