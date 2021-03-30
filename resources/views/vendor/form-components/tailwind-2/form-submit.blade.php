<div class="mt-6 flex items-center justify-between">
    <button {!! $attributes->merge([
        'class' => 'border border-gray-300 bg-teal-400 hover:bg-teal-500 text-white font-bold sm:mr-5 mb-5 py-2 px-4 rounded my-3',
        'type' => 'submit'
    ]) !!}>
        {!! trim($slot) ?: __('Submit') !!}
    </button>
</div>