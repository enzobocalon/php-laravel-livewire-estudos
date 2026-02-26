<div class="w-full flex items-center justify-between p-4 bg-white shadow">
    <div>
        <p>Logo</p>
    </div>
    <div>
        <ul class="flex gap-4 items-center">
            @auth
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li>
                    <button wire:click="logout" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Logout
                    </button>
                </li>
            @else
                <li><a href="{{ route('auth.login') }}">Login</a></li>
                <li><a href="{{ route('auth.signup') }}">Signup</a></li>
            @endauth
        </ul>
    </div>
</div>
