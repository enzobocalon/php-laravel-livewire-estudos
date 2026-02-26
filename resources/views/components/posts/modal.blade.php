<div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Nova Postagem</h2>

        <form wire:submit="handleSubmit">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    wire:model="title"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 p-2"
                >
            </div>

            <div class="mb-4">
                <label for="image_path" class="block text-sm font-medium text-gray-700">Caminho da Imagem</label>
                <input
                    type="text"
                    id="image_path"
                    wire:model="image_path"
                    name="image_path"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 p-2"
                >
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo</label>
                <textarea
                    id="content"
                    name="content"
                    wire:model="content"
                    rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 p-2"
                ></textarea>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button
                    x-on:click="$dispatch('close-modal')"
                    class="px-4 py-2 bg-gray-300 rounded cursor-pointer"
                >
                    Cancelar
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 cursor-pointer"
                >
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>
