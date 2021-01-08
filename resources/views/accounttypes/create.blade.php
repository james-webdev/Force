@extends ('layouts.app')
@section('content')
 <div class="container">  
<h2>Create New Account Type</h2>
<form action="{{route('accounttypes.store')}}"
method="post"
>
@csrf

@include('accounttypes.partials._form')
<input type="submit" name="submit" value="Create New Type">
</form>
</div>
@endsection