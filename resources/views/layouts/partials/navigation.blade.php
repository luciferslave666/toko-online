<nav x-data="{ open: false, searchOpen: false }" class="bg-white border-b border-gray-200 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <div class="flex items-center">
                <div class="md:hidden mr-4">
                   <button @click="open = ! open" class="focus:outline-none p-2 rounded-md text-gray-700 hover:text-black hover:bg-gray-100">
                       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                   </button>
                </div>
                <a href="{{ route('landing') }}" class="text-2xl font-bold text-black tracking-wider">
                    Rupa Collective
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <button @click="searchOpen = !searchOpen" class="focus:outline-none p-1">
                    <svg class="h-6 w-6 text-gray-700 hover:text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>

                <a href="{{ route('cart.index') }}" class="relative p-1">
                    <svg class="h-6 w-6 text-gray-700 hover:text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.023.828L5.75 14.75a1.125 1.125 0 001.124 1.25h11.332c.677 0 1.25-.561 1.12-1.25L19.25 5.5H5.068a1.125 1.125 0 01-1.023-.828L2.25 3zM9.75 19.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3zM16.5 19.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                    </svg>
                    @if(isset($cartCount) && $cartCount > 0)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full transform translate-x-1/2 -translate-y-1/2">{{ $cartCount }}</span>
                    @endif
                </a>
                
                @auth
                    {{-- Dropdown untuk pengguna yang sudah login --}}
                    <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                        <button @click="dropdownOpen = !dropdownOpen" class="focus:outline-none p-1">
                             <svg class="h-7 w-7 text-gray-700 hover:text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                             </svg>
                        </button>
                        <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50 bg-white" style="display: none;">
                             <div class="py-1 rounded-md ring-1 ring-black ring-opacity-5">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                @if(isset($hasOrders) && $hasOrders)
                                    <a href="{{ route('orders.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Pesanan</a>
                                @endif
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pesanan (Admin)</a>
                                    <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Produk (Admin)</a>
                                        <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 ...">Kategori (Admin)</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Log Out
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Link untuk pengguna tamu (belum login) --}}
                    <div class="hidden sm:flex items-center">
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="hidden md:flex justify-center items-center pb-4">
        <div class="space-x-8">
            <a href="{{ route('landing') }}" class="text-gray-700 hover:text-black font-medium tracking-wide">Home</a>
            <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-black font-medium tracking-wide">Shop</a>
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-black font-medium tracking-wide">About Us</a>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('landing') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Home</a>
            <a href="{{ route('products.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Shop</a>
            <a href="{{ route('about') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">About Us</a>
        </div>
    </div>

    <div x-show="searchOpen" @click.outside="searchOpen = false" x-transition class="absolute top-full left-0 w-full bg-white border-b z-40" style="display: none;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <form action="{{ route('products.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Cari produk dan tekan enter..."
                       class="w-full px-4 py-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" autofocus>
            </form>
        </div>
    </div>
</nav>