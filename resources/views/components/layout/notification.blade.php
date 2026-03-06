{{-- Precisa do .window pq ele ta em escopos diferentes (divs irmãs) --}}
<div
    x-init="
        @if(session('message'))
            notification = '{{ session('message') }}';
            type = '{{ session('type', 'success') }}';

            setTimeout(() => notification = null, 5000);
        @endif
    "
    x-data="{ notification: null, type: null }"
    x-on:notify-{{ $channel }}.window="
                notification = $event.detail.message;
                type = $event.detail.type;

                setTimeout(() => notification = null, 5000);
            "
>
    <div
        x-show="notification"
        x-text="notification"
        :class="type === 'error' ? 'bg-red-500' : 'bg-green-500'"
        class="text-white px-4 py-2 rounded mb-4"
    ></div>
</div>
