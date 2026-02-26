<div
    x-data="{ open: false }"
    x-on:close-modal="open = false" {{-- pode-se usar .window (close-modal.window) para mudar o escopo pra window ao invés de usar escopo local --}}
    class="w-full max-w-360 m-auto flex flex-col items-center pt-4"
>
    <div x-show="open">
        <livewire:posts.modal />
    </div>

    <div class="w-full flex justify-between items-center">
        <h1 class="font-semibold text-2xl">Postagens</h1>
        <button
            x-on:click="open = true"
            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 cursor-pointer"
        >
            Criar
        </button>
    </div>

    @if($posts->isEmpty())
        <div class="flex items-center justify-center w-full">
            <p class="mt-4 text-gray-500">Nenhuma postagem encontrada.</p>
        </div>
    @else
        @foreach ($posts as $post)
            <div class="w-full bg-white p-4 rounded shadow mt-4">
                <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                <p class="text-gray-600 mt-2">{{ $post->content }}</p>
            </div>
        @endforeach
    @endif
</div>
