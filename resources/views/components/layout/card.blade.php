<div
    x-on:click="{{ $click }}"
    {{ $attributes->merge([
        'class' => 'w-full cursor-pointer bg-white p-4 rounded-xl shadow-sm mt-4 flex items-center justify-between transition-all duration-200 ease-in-out hover:shadow-lg hover:-translate-y-1 hover:bg-gray-50'
    ]) }}
>
    {{ $slot }}
</div>
