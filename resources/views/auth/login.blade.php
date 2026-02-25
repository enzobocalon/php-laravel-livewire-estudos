<x-auth.card title="Login Livewire">
        <form wire:submit="submit" class="mt-4">
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input
                    type="email"
                    class="w-full px-3 py-2 border rounded"
                    wire:model="email"
                >
                {{--
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                --}}
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
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
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600"
            >
                Login
            </button>

            <p> Não possui conta? <a href="{{ route('auth.signup') }}" class="text-blue-500 hover:underline">Cadastrar-se</a></p>
        </form>
</x-auth.card>
