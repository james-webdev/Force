@extends ('layouts.app')
@section('content')
 <div class="container">  
<h2>Create New User</h2>
<form action="{{route('users.store')}}"
method="post"
>
@csrf

@include('users.partials._form')
<input type="submit" name="submit" value="Create New User">
</form>
</div>
@endsection