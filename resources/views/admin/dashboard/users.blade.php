<div>
    <x-layout.notification channel="admin-users" />
    @if ($users->isEmpty())
        <div class="flex items-center justify-center w-full">
            <p class="mt-4 text-gray-500">Nenhum usuário encontrad.</p>
        </div>
    @else
        @foreach ($users as $user)
            <x-layout.card
                :click="'window.location = \''.route('admin.dashboard.user', ['id' => $user->id]).'\''"
            >
                <div>
                    <h2 class="text-lg font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ $user->email }}</p>
                </div>
            </x-layout.card>
        @endforeach
    @endif
</div>
