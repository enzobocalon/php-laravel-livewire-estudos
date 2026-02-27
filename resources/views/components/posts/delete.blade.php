<x-layout.modal>
    <h2 class="text-lg font-bold mb-4">Apagar Postagem</h2>
    <p>
        Tem certeza que deseja apagar a postagem: <strong x-text="selectedPostTitle"></strong>?
    </p>

    <div class="flex justify-end gap-2 mt-4">
        <button x-on:click="openDeleteModal = false" class="px-4 py-2 bg-gray-300 rounded cursor-pointer">
            Cancelar
        </button>
        <button
            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer"
            x-on:click="$wire.delete(selectedPostId)"
        >
            Apagar
        </button>
    </div>
</x-layout.modal>
