<x-auth.card title="Cadastro Livewire">
    <form wire:submit="submit" class="mt-4">
        <div class="mb-4">
            <label class="block text-gray-700">Nome</label>
            <input
                type="text"
                class="w-full px-3 py-2 border rounded"
                wire:model="name"
            >
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input
                type="email"
                class="w-full px-3 py-2 border rounded"
                wire:model="email"
            >
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Senha</label>
            <input
                type="password"
                class="w-full px-3 py-2 border rounded"
                wire:model="password"
            >
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 cursor-pointer"
        >
            Cadastrar
        </button>

        <p> Já possui conta? <a href="{{ route('auth.login') }}" class="text-blue-500 hover:underline">Entrar</a></p>
</x-auth.card>
