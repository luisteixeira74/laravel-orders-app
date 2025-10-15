<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow px-6 py-3 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Pedidos App</h1>

        <nav class="flex items-center space-x-4 relative">
            @auth
                @php
                    $pendingOrders = \App\Models\Order::where('status', 'pendente')->count();
                @endphp
                <div x-data="{ open: false }" class="relative" @click.outside="open = false">
                    <button 
                        @click.stop="open = !open" 
                        class="bg-blue-500 text-white px-3 py-1.5 rounded-xl text-sm flex items-center gap-2 max-w-[160px] truncate hover:bg-blue-600 transition-all duration-200"
                    >
                        Luis Fernando
                        <span class="bg-yellow-500 text-white text-xs font-semibold px-2 h-5 leading-none rounded-md flex items-center justify-center">
                            3
                        </span>
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div 
                        x-cloak
                        x-show="open" 
                        x-transition.origin.top.right
                        class="absolute right-0 mt-2 w-44 bg-white border rounded-lg shadow-lg z-10"
                    >
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-t-lg">Dashboard</a>
                        <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pedidos</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100 rounded-b-lg">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline text-sm">Login</a>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline text-sm">Registrar</a>
            @endauth
        </nav>
    </header>

    <main class="p-6">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
