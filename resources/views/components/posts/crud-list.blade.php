@if ($posts->isEmpty())
    <div class="flex items-center justify-center w-full">
        <p class="mt-4 text-gray-500">Nenhuma postagem encontrada.</p>
    </div>
@else
    @foreach ($posts as $post)
        <x-layout.card
            :click="'window.location = \''.route('home.detail', ['slug' => $post->slug]).'\''"
            wire:key="post-{{ $post->id }}"
        >
            <div>
                <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                <p class="text-gray-600 mt-2">{{ $post->content }}</p>
            </div>
            <div>
                @if ($post->user_id === auth()->id() || auth()->user()->is_admin)
                    <button
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 cursor-pointer"
                        x-on:click.stop="
                            ((openCreateUpdateModal = true),
                                (isLoading = true),
                                $dispatch('edit-post', { id: {{ $post->id }} }))
                        "
                    >
                        Editar
                    </button>
                    <button
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 cursor-pointer"
                        x-on:click.stop="
                            ((openDeleteModal = true),
                                (selectedPostId = {{ $post->id }}),
                                (selectedPostTitle = '{{ $post->title }}'))
                        "
                    >
                        Excluir
                    </button>
                @endif
            </div>
        </x-layout.card>
    @endforeach

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endif
