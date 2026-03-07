<div
    class="w-full max-w-360 mx-auto p-4"
>
    <div
        x-data="{
            openCreateUpdateModal: false,
            openDeleteModal: false,
            selectedPostId: null,
            selectedPostTitle: '',
            isLoading: false,
        }"
        x-on:close-create-update-modal="openCreateUpdateModal = false"
        x-on:close-delete-modal="openDeleteModal = false"
        class="w-full my-4 bg-white p-4 rounded-xl shadow"
    >
        <div x-show="openCreateUpdateModal">
            <livewire:posts.create-update channel="detail" />
        </div>
        <div x-show="openDeleteModal">
            <livewire:posts.delete channel="detail" />
        </div>
        <x-layout.notification channel="detail" />
        <div class="w-full flex items-center justify-between">
            <div>
                <h1 class="font-bold text-2xl">{{ $post->title }}</h1>
                <p class="text-gray-700 text-sm">Por: {{ $post->user->name }}</p>
                <p class="text-gray-600 text-sm">
                    Publicado em {{ $post->created_at->format('d/m/Y') }}
                </p>
            </div>
            <div>
                @if ($post->user_id === auth()->id() || Gate::allows('isAdmin'))
                    <button
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 cursor-pointer"
                        x-on:click="
                            ((openCreateUpdateModal = true),
                                (isLoading = true),
                                $dispatch('edit-post', { id: {{ $post->id }} }))
                        "
                    >
                        Editar
                    </button>
                    <button
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 cursor-pointer"
                        x-on:click="
                            ((openDeleteModal = true),
                                (selectedPostId = {{ $post->id }}),
                                (selectedPostTitle = '{{ $post->title }}'))
                        "
                    >
                        Excluir
                    </button>
                @endif
            </div>
        </div>
        @if (! empty($post->image_path) && filter_var($post->image_path, FILTER_VALIDATE_URL))
            <img
                src="{{ $post->image_path }}"
                alt="{{ $post->title }}"
                class="w-full h-auto mt-4 rounded"
            />
        @endif

        <p class="mt-4">{{ $post->content }}</p>
    </div>
</div>
