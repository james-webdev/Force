@extends ('layouts.app')
@section('content')
 

@livewire('opportunities-table', ['stage_id'=>$stage->id])


@endsection
