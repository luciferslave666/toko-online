@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        {{-- Pesan Sukses (jika ada) --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Bagian Header dengan Judul dan Tombol Keranjang --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Katalog Produk</h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- Loop untuk setiap produk --}}
            @forelse ($products as $product)
                {{-- Seluruh kartu produk sekarang adalah link ke halaman detail --}}
                <a href="{{ route('products.show', $product) }}" class="block">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 h-full">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
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
    </div>
@endsection