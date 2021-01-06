@extends ('layouts.app')
@section('content')
 <div class="container">  
<h2>Edit Account Type  {{$accounttype->type}}</h2>
<form action="{{route('accounttypes.update')}}"
method="post"
>
@csrf
@method('put')

@include('accounttypes.partials._form')
<input type="submit" name="submit" value="Update Type">
</form>
</div>
@endsection