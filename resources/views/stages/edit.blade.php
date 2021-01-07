@extends ('layouts.app')
@section('content')
 <div class="container">  
<h2>Edit Account Type  {{$stage->type}}</h2>
<form action="{{route('stages.update')}}"
method="post"
>
@csrf
@method('put')

@include('stages.partials._form')
<input type="submit" name="submit" value="Update Type">
</form>
</div>
@endsection