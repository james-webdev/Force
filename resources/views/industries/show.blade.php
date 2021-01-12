@extends ('layouts.app')
@section('content')

<div class="container">
@livewire('accounts-table',[ 'industry'=>$industry->id])
</div>


@endsection
