@extends ('layouts.app')
@section('content')

<div>


    @livewire('accounts-table', ['accounttype'=>$accounttype->id])


</div> 
@endsection
