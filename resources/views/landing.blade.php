@extends('layouts.app')

{{-- @section('title', 'NOCTXVIBE - Temukan Gaya Unikmu') --}}
{{-- Judul halaman akan diambil dari config('app.name') di layouts/app.blade.php --}}

@section('content')
    {{-- Pesan Sukses (jika ada) --}}
    @if(session('success'))
        <div class="container mx-auto px-4 mt-8">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Hero Section --}}
    <div class="relative bg-gradient-to-r from-gray-800 to-gray-900 text-white py-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20" style="background-image: url('https://placehold.co/1920x1080/000000/FFFFFF?text=NOCTVIBE'); background-size: cover; background-position: center;"></div>
        <div class="relative z-10 max-w-4xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-4 animate-fade-in-up">
                Temukan Gaya Unikmu di NOCTVIBE
            </h1>
            <p class="text-lg sm:text-xl mb-8 opacity-90 animate-fade-in-up delay-200">
                Koleksi fashion terbaru yang akan membuatmu tampil beda dan percaya diri.
            </p>
            <a href="#product-catalog" class="inline-block bg-white text-gray-900 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-200 transition duration-300 transform hover:scale-105 animate-fade-in-up delay-400">
                Jelajahi Sekarang
            </a>
        </div>
    </div>

    {{-- Section: Galeri Foto Produk Saja --}}
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Sekilas Koleksi Kami</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            @forelse ($products as $product)
                <div class="relative w-full h-48 sm:h-56 md:h-64 rounded-lg overflow-hidden shadow-md group">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x400/CCCCCC/333333?text=Product+Image' }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-white text-sm font-medium p-2 bg-black bg-opacity-50 rounded-md">{{ $product->name }}</span>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada gambar produk untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>

    <!-- {{-- Bagian Header dengan Judul dan Tombol Keranjang (Existing Catalog Header) --}}
    <div class="container mx-auto px-4 py-8" id="product-catalog">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Katalog Produk Lengkap</h1>
        </div>

        {{-- Grid Produk (Existing) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <a href="{{ route('products.show', $product) }}" class="block">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 h-full">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x400/CCCCCC/333333?text=Product+Image' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                            <p class="text-gray-600 mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada produk yang tersedia.</p>
            @endforelse
        </div>
    </div> -->

    {{-- Footer Section --}}
    <footer class="bg-gray-900 text-gray-300 py-10 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Kolom 1: Informasi Brand --}}
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">NOCTXVIBE</h3>
                    <p class="text-sm">
                        Temukan gaya unikmu dengan koleksi fashion terbaru dari NOCTVIBE. Kualitas premium, desain eksklusif.
                    </p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.002 3.797.048.843.04 1.15.137 1.243.157.607.125.93.356 1.18.607.25.25.488.587.607 1.18.02.093.117.40.157 1.243.046 1.013.048 1.376.048 3.797v.648c0 2.43-.002 2.784-.048 3.797-.04.843-.137 1.15-.157 1.243-.125.607-.356.93-.607 1.18-.25.25-.587.488-1.18.607-.093.02-.4.117-1.243.157-1.013.046-1.376.048-3.797.048h-.648c-2.43 0-2.784-.002-3.797-.048-.843-.04-1.15-.137-1.243-.157-.607-.125-.93-.356-1.18-.607-.25-.25-.587-.488-.607-1.18-.02-.093-.117-.4-.157-1.243-.046-1.013-.048-1.376-.048-3.797v-.648zM12 20.211c-4.508 0-8.147-3.639-8.147-8.147s3.639-8.147 8.147-8.147 8.147 3.639 8.147 8.147-3.639 8.147-8.147 8.147zm0-14.594c-3.584 0-6.49 2.906-6.49 6.49s2.906 6.49 6.49 6.49 6.49-2.906 6.49-6.49-2.906-6.49-6.49-6.49zm5.343 1.957a1.22 1.22 0 100 2.44 1.22 1.22 0 000-2.44z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Kolom 2: Tautan Cepat --}}
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="hover:text-white transition-colors duration-300">Home</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300">Shop</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300">About Us</a></li>
                        <li><a href="{{ route('cart.index') }}" class="hover:text-white transition-colors duration-300">Keranjang</a></li>
                        @auth
                            <li><a href="{{ route('profile.edit') }}" class="hover:text-white transition-colors duration-300">Profil</a></li>
                            @if(isset($hasOrders) && $hasOrders)
                                <li><a href="{{ route('orders.history') }}" class="hover:text-white transition-colors duration-300">Riwayat Pesanan</a></li>
                            @endif
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <li><a href="{{ route('admin.orders.index') }}" class="hover:text-white transition-colors duration-300">Pesanan (Admin)</a></li>
                                <li><a href="{{ route('admin.products.index') }}" class="hover:text-white transition-colors duration-300">Produk (Admin)</a></li>
                            @endif
                        @else
                            <li><a href="{{ route('login') }}" class="hover:text-white transition-colors duration-300">Login</a></li>
                        @endauth
                    </ul>
                </div>

                {{-- Kolom 3: Kontak Kami --}}
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Hubungi Kami</h3>
                    <p class="text-sm mb-2">Email: info@noctvibe.com</p>
                    <p class="text-sm mb-2">Telepon: +62 812-3456-7890</p>
                    <p class="text-sm">Alamat: Jl. Contoh No. 123, Kota Bandung, Indonesia</p>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} NOCTVIBE. All rights reserved.
            </div>
        </div>
    </footer>
@endsection