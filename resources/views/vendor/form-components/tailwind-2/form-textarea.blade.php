<div class="mt-4">
    <label class="block font-bold">
        <x-form-label :label="$label" />

        <textarea
            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif

            {!! $attributes->merge(['class' => 'block w-full shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' . ($label ? 'mt-1' : '')]) !!}
        >@unless($isWired()){!! $value !!}@endunless</textarea>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>