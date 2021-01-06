@extends ('layouts.app')
@section('content')
 <div class="container">  
<h2>Edit  {{$industry->industry}}</h2>
<form action="{{route('industries.update')}}"
method="post"
>
@csrf
@method('put')

@include('industries.partials._form')
<input industry="submit" name="submit" value="Update industry">
</form>
</div>
@endsection