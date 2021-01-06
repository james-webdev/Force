@extends ('layouts.app')
@section('content')
 <div class="container">  
<h2>Create New  industry</h2>
<form action="{{route('industry.store')}}"
method="post"
>
@csrf

@include('industrys.partials._form')
<input industry="submit" name="submit" value="Create New industry">
</form>
</div>
@endsection