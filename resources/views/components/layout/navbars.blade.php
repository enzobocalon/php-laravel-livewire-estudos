<div class="w-full flex items-center justify-between p-4 bg-white shadow">
    <div>
        <p class="font-semibold">Logo</p>
    </div>

    <div>
        <ul class="flex gap-6 items-center">
            @auth
                <li>
                    <a
                        href="{{ route('home.index') }}"
                        class="hover:text-blue-600 transition-colors"
                    >
                        Home
                    </a>
                </li>

                <li class="relative group">
                    <button
                        class="flex items-center gap-2 hover:text-blue-600 transition-colors cursor-pointer"
                    >
                        {{ auth()->user()->name }}

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 transition-transform group-hover:rotate-180"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>

                    <div
                        class="absolute right-0 top-full pt-2 w-44 opacity-0 invisible translate-y-1 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 ease-out"
                    >
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden"
                        >
                            <ul class="py-1 text-sm">
                                @can('isAdmin')
                                    <li>
                                        <a
                                            href="{{ route('admin.dashboard.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-50 transition-colors"
                                        >
                                            Dashboard
                                        </a>
                                    </li>
                                @endcan

                                <li>
                                    <button
                                        wire:click="logout"
                                        class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition-colors cursor-pointer"
                                    >
                                        Logout
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            @else
                <li>
                    <a
                        href="{{ route('auth.login') }}"
                        class="hover:text-blue-600 transition-colors"
                    >
                        Login
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('auth.signup') }}"
                        class="hover:text-blue-600 transition-colors"
                    >
                        Signup
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</div>
