@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <div>
                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x600' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
                </div>

            <div>
                @if($product->category)
                <a href="#" class="text-sm font-medium text-red-600 hover:text-red-500">{{ $product->category->name }}</a>
                @endif
                
                <h1 class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">{{ $product->name }}</h1>
                
                <div class="mt-4">
                    <p class="text-3xl text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>

                <div class="mt-6">
                    <h3 class="sr-only">Deskripsi</h3>
                    <div class="space-y-6 text-base text-gray-700">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <p class="text-sm font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $product->stock > 0 ? 'Stok Tersedia: ' . $product->stock : 'Stok Habis' }}
                    </p>
                </div>

                @if($product->stock > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-8">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <div>
                            <label for="quantity" class="sr-only">Jumlah</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                                   class="w-20 rounded-md border-gray-300 text-center focus:ring-red-500 focus:border-red-500">
                        </div>
                        <button type="submit" class="flex-1 bg-red-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-red-700">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </form>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Produk Lain yang Mungkin Anda Suka</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Loop untuk menampilkan produk terkait bisa ditambahkan di sini --}}
            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden lg:h-80">
                    <div class="w-full h-full bg-gray-300"></div>
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="#">Nama Produk Terkait</a>
                        </h3>
                    </div>
                    <p class="text-sm font-medium text-gray-900">Rp 0</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection