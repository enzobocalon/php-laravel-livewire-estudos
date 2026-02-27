<x-layout.modal>
    <div
         x-on:end-loading.window="isLoading = false"
         x-on:start-loading.window="isLoading = true"
         x-on:create-post.window="
            $wire.set('postId', null);
            $wire.set('title', '');
            $wire.set('image_path', '');
            $wire.set('content', '');
         "
        >

        <h2 class="text-lg font-bold mb-4">Nova Postagem</h2>

        {{-- Skeleton --}}
        <div x-show="isLoading" class="space-y-5 animate-pulse p-1">
            <div class="h-5 bg-gray-100 rounded-full w-1/3"></div>
            <div class="space-y-2">
                <div class="h-3 bg-gray-100 rounded-full w-1/4"></div>
                <div class="h-11 bg-gray-100 rounded-xl w-full"></div>
            </div>
            <div class="space-y-2">
                <div class="h-3 bg-gray-100 rounded-full w-1/4"></div>
                <div class="h-11 bg-gray-100 rounded-xl w-full"></div>
            </div>
            <div class="space-y-2">
                <div class="h-3 bg-gray-100 rounded-full w-1/4"></div>
                <div class="h-28 bg-gray-100 rounded-xl w-full"></div>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <div class="h-10 bg-gray-100 rounded-lg w-24"></div>
                <div class="h-10 bg-gray-100 rounded-lg w-24"></div>
            </div>
        </div>

        {{-- Form --}}
        <form x-show="!isLoading" wire:submit="handleSubmit">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" id="title" wire:model="title"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 p-2">
            </div>

            <div class="mb-4">
                <label for="image_path" class="block text-sm font-medium text-gray-700">Caminho da Imagem</label>
                <input type="text" id="image_path" wire:model="image_path"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 p-2">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo</label>
                <textarea id="content" wire:model="content" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 p-2"></textarea>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" x-on:click="openCreateUpdateModal = false"
                    class="px-4 py-2 bg-gray-300 rounded cursor-pointer">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 cursor-pointer">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</x-layout.modal>
