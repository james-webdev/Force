<div class="@if($type === 'hidden') hidden @else mt-4 @endif">
    <label class="block  font-bold">
        <x-form-label :label="$label" />

        <input {!! $attributes->merge([
            'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ' . ($label ? 'mt-1' : '')
        ]) !!}
            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @else
                name="{{ $name }}"
                value="{{ $value }}"
            @endif

            type="{{ $type }}" />
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>