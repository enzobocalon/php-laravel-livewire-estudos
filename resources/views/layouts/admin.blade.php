<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div class="min-h-screen bg-gray-100 w-full">
            <div class="min-h-screen flex bg-gray-100">
                {{-- Sidebar --}}
                <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
                    <div class="p-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800">Admin Dashboard</h2>
                    </div>

                    <nav class="flex-1 p-4 space-y-1">
                        <a
                            href="{{ route('admin.dashboard.index') }}"
                            class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition"
                        >
                            Dashboard
                        </a>

                        <a
                            href="{{ route('admin.dashboard.users') }}"
                            class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition"
                        >
                            Usuários
                        </a>
                    </nav>
                </aside>

                {{-- Conteúdo --}}
                <div class="flex-1 flex flex-col">
                    {{-- Header --}}
                    <header class="bg-white border-b border-gray-200 px-6 py-4">
                        <h1 class="text-xl font-semibold text-gray-800">{{ $renderTitle ?? 'Dashboard' }}</h1>
                    </header>

                    {{-- Page Content --}}
                    <main class="flex-1 p-6">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
