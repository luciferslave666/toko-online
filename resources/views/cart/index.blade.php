@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12 h-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row -mx-4">

            <div class="w-full lg:w-2/3 px-4 mb-8 lg:mb-0">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h1 class="text-2xl font-bold mb-6 border-b pb-4">Keranjang Belanja Anda ({{ $cartItems->count() }} Item)</h1>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="space-y-6">
                        @forelse ($cartItems as $item)
                            <div class="flex items-start sm:items-center justify-between flex-col sm:flex-row">
                                <div class="flex items-center mb-4 sm:mb-0">
                                    <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://placehold.co/150' }}" alt="{{ $item->product->name }}" class="rounded w-24 h-24 object-cover mr-4">
                                    <div>
                                        <a href="{{ route('products.show', $item->product) }}" class="font-semibold text-lg hover:text-red-600">{{ $item->product->name }}</a>
                                        <p class="text-gray-600">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                                        <button type="submit" class="ml-2 bg-gray-200 text-gray-700 px-3 py-1 text-sm rounded hover:bg-gray-300">Update</button>
                                    </form>
                                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold" onclick="return confirm('Yakin ingin menghapus item ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-16">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Keranjang belanja Anda kosong</h3>
                                <p class="mt-1 text-sm text-gray-500">Ayo mulai belanja!</p>
                                <div class="mt-6">
                                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700">
                                        Lanjut Belanja
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            @if($cartItems->isNotEmpty())
                <div class="w-full lg:w-1/3 px-4">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-8">
                        <h2 class="text-xl font-bold mb-4 border-b pb-4">Ringkasan Pesanan</h2>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <span class="text-gray-600">Ongkos Kirim</span>
                            <span class="text-gray-900">Akan dihitung</span>
                        </div>
                        <div class="border-t pt-4 flex justify-between font-bold text-lg">
                            <span>Total</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="mt-6 w-full text-center inline-block bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 transition-transform duration-300 hover:scale-105">
                            Lanjut ke Checkout
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection