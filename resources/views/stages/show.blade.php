@extends ('layouts.app')
@section('content')
   
<div class="container">
<h2>{{$stage->stage}}</h2>
<p><i class="far fa-edit text-teal-400 font-medium"></i><a href="{{route('stages.edit', $stage->id)}}" title="Edit {{$stage->stage}}">Edit {{$stage->stage}}</a></p>

<p>There are {{$stage->opportunites_count}} opportunites in this stage.</p>
</div>


@endsection