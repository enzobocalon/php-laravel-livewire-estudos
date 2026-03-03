@props(['title' => null])

<div class="min-h-screen w-full flex items-center justify-center">
    <div class="bg-white p-8 shadow-md w-full max-w-md rounded-2xl">
        @isset($title)
            <h1 class="text-center font-md text-2xl">{{ $title }}</h1>
        @endisset

        {{ $slot }}
    </div>
</div>
