@extends ('layouts.app')
@section('content')
   
<div class="container">
<h2>{{$accounttype->type}}</h2>

<p>There are {{$accounttype->accounts_count}} accounts in this type.</p>
</div>


@endsection