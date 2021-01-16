@extends ('layouts.app')
@section('content')

<div>

@livewire('accounts-table', ['user_id'=>$user->id])

</div>
@endsection
