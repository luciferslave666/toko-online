@extends('layouts.app')

@section('content')
    <div class="bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            {{-- Pesan Sukses (jika ada) --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Our Collection</h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">Jelajahi koleksi eksklusif yang dirancang untuk gaya unik Anda.</p>
            </div>
                <div class="mt-8 max-w-md mx-auto">
            </div>
            <div class="flex flex-col md:flex-row gap-8">
                
                {{-- Sidebar untuk Filter --}}
                <aside class="w-full md:w-1/4 lg:w-1/5">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                                            <form action="{{ route('products.index') }}" method="GET" class="flex items-center pb-10">
            <input type="text" name="search" placeholder="Cari produk..." value="{{ $search ?? '' }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-red-500">
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-r-md hover:bg-red-700">
                Cari
            </button>
        </form>
        <hr>
                        
                        {{-- Filter Kategori (Contoh) --}}
                        <div class="mb-6">
                            <h4 class="font-semibold mb-2">Kategori</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li><a href="#" class="hover:text-red-600">T-Shirts</a></li>
                                <li><a href="#" class="hover:text-red-600">Hoodies</a></li>
                                <li><a href="#" class="hover:text-red-600">Pants</a></li>
                                <li><a href="#" class="hover:text-red-600">Accessories</a></li>
                            </ul>
                        </div>
                        
                        {{-- Filter Harga (Contoh) --}}
                        <div>
                            <h4 class="font-semibold mb-2">Rentang Harga</h4>
                            <input type="range" class="w-full">
                            <div class="flex justify-between text-sm text-gray-600 mt-2">
                                <span>Rp 0</span>
                                <span>Rp 1.000.000+</span>
                            </div>
                        </div>
                    </div>
                </aside>

                {{-- Grid Produk Utama --}}
                <main class="w-full md:w-3/4 lg:w-4/5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @forelse ($products as $product)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group transition-transform duration-300 ease-in-out hover:-translate-y-1">
                                <a href="{{ route('products.show', $product) }}" class="block">
                                    <div class="relative">
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x500/CCCCCC/333333?text=Product' }}" alt="{{ $product->name }}" class="w-full h-72 object-cover">
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                    </div>
                                    <div class="p-4">
                                        <h2 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h2>
                                        <p class="text-gray-900 font-bold mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-500 py-16">Belum ada produk yang tersedia.</p>
                        @endforelse
                    </div>
                    
                </main>

            </div>
        </div>
    </div>
@endsection