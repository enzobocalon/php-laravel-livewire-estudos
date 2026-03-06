<div class="w-full flex flex-col items-center px-4 gap-4">
    <div class="w-full max-w-2xl">
        <x-layout.notification channel="admin-user" />
    </div>

    <div class="w-full max-w-2xl bg-white shadow-md rounded-xl border border-gray-200">
        <div class="border-b border-gray-200 px-6 py-4 flex items-center gap-4">
            <div
                class="w-14 h-14 flex items-center justify-center rounded-full bg-gray-200 text-gray-700 font-bold text-xl"
            >
                {{ strtoupper(substr($name, 0, 1)) }}
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-800">Editar usuário</h2>
                <p class="text-sm text-gray-500">ID: {{ $userId }}</p>
            </div>
        </div>

        <form class="px-6 py-6 flex flex-col gap-5" wire:submit="update">
            <div class="flex flex-col gap-1">
                <label class="text-sm text-gray-600">Nome</label>
                <input
                    type="text"
                    wire:model="name"
                    class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>

            <div class="flex flex-col gap-1">
                <label class="text-sm text-gray-600">Email</label>
                <input
                    type="email"
                    wire:model="email"
                    class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" class="w-4 h-4" wire:model="is_admin" />
                <span class="text-sm text-gray-700">Administrador</span>
            </div>

            <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                <button
                    type="button"
                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition"
                    wire:click="delete"
                    wire:confirm="Tem certeza que deseja excluir este usuário?"
                >
                    Excluir usuário
                </button>

                <button
                    type="submit"
                    class="bg-blue-500 text-white px-5 py-2 rounded-md hover:bg-blue-600 transition"
                >
                    Salvar alterações
                </button>
            </div>
        </form>
    </div>
</div>
