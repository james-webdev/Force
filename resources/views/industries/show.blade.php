@extends ('layouts.app')
@section('content')

<div class="container">
@livewire('industry-table',['industry'=>$industry->id])
</div>


@endsection
