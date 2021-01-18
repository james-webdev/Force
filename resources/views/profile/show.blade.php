@extends('layouts.app')
@section('content')
<h1 class="mb-8 font-bold pt-10 text-3xl text-teal-400 font-medium">{{ $user->name }}</h1>
<p class="mb-8 font-bold pt-5 text-2xl text-teal-400 font-medium">{{ $user->email }}</p>
<form wire:submit.prevent="save">
    <input type="file" wire:model="photo">

    @error('photo') <span class="error">{{ $message }}</span> @enderror

            <div class="">
                <button
                    type="submit"
                    class="border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold mr-5 mb-5 py-2 px-4 rounded my-3">
                    Upload Profile Pic
                </button>
            </div>
</form>


@endsection
