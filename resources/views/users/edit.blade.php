@extends ('layouts.app')
@section('content')
 <div class="container">  
<h2>Edit User  {{$user->name}}</h2>
<form action="{{route('user.update', $user->id)}}"
method="post"
>
@csrf
@method('put')

@include('users.partials._form')
<input type="submit" name="submit" value="Update User">
</form>
</div>
@endsection