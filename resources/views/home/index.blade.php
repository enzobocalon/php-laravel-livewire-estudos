<div x-data="{
        openCreateUpdateModal: false,
        openDeleteModal: false,
        selectedPostId: null,
        selectedPostTitle: '',
        isLoading: false
    }" x-on:close-create-update-modal="openCreateUpdateModal = false" x-on:close-delete-modal="openDeleteModal = false"
    class="w-full max-w-360 m-auto flex flex-col items-center pt-4">
    <div x-show="openCreateUpdateModal">
        <livewire:posts.create-update />
    </div>

    <div x-show="openDeleteModal">
        <livewire:posts.delete />
    </div>

    <div class="w-full">
        {{-- Precisa do .window pq ele ta em escopos diferentes (divs irmãs) --}}
        <div x-data="{ notification: null, type: null }" x-on:notify-home.window="
                notification = $event.detail.message;
                type = $event.detail.type;

                setTimeout(() => notification = null, 5000);
            ">
            <div x-show="notification" x-text="notification" :class="type === 'error' ? 'bg-red-500' : 'bg-green-500'"
                class="text-white px-4 py-2 rounded mb-4"></div>
        </div>

        <div class="w-full flex justify-between items-center">
            <h1 class="font-semibold text-2xl">Postagens</h1>
            <button x-on:click="openCreateUpdateModal = true; $dispatch('create-post');"
                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 cursor-pointer">
                Criar
            </button>
        </div>

        @if($posts->isEmpty())
            <div class="flex items-center justify-center w-full">
                <p class="mt-4 text-gray-500">Nenhuma postagem encontrada.</p>
            </div>
        @else
            @foreach ($posts as $post)
                <div wire:key="post-{{ $post->id }}"
                    class="w-full bg-white p-4 rounded shadow mt-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ $post->content }}</p>
                    </div>
                    <div>
                        <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 cursor-pointer" x-on:click="
                                        openCreateUpdateModal = true,
                                        isLoading = true,
                                        $dispatch('edit-post', { id: {{ $post->id }} })">
                            Editar
                        </button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 cursor-pointer" x-on:click="
                                                                            openDeleteModal = true,
                                                                            selectedPostId = {{ $post->id }},
                                                                            selectedPostTitle = '{{ $post->title }}'
                                                                            ">
                            Excluir
                        </button>
                    </div>
                </div>
            @endforeach

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
