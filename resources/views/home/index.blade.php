<x-posts.crud-container :posts="$posts" channel="home">

    <x-slot:header>
        <div class="w-full flex justify-between items-center">
            <h1 class="font-semibold text-2xl">Postagens</h1>

            <button
                x-on:click="
                    openCreateUpdateModal = true
                    $dispatch('create-post')
                "
                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 cursor-pointer"
            >
                Criar
            </button>
        </div>
    </x-slot>

</x-posts.crud-container>
