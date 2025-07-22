{{-- resources/views/cart/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5">
        <h1 class="text-3xl font-bold mb-6">Keranjang Belanja Anda</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            @forelse ($cartItems as $item)
    <div class="flex items-center justify-between border-b pb-4 mb-4 flex-wrap">
        {{-- Detail Produk --}}
        <div class="flex items-center mb-4 sm:mb-0">
            <img src="https://via.placeholder.com/100" alt="{{ $item->product->name }}" class="rounded mr-4 w-20 h-20 object-cover">
            <div>
                <h2 class="font-semibold text-lg">{{ $item->product->name }}</h2>
                <p class="text-gray-600">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
            </div>
        </div>

        {{-- Form Update & Tombol Hapus --}}
        <div class="flex items-center space-x-4">
            {{-- Form Update Jumlah --}}
            <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center">
                @csrf
                @method('PATCH')
                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border-gray-300 rounded-md">
                <button type="submit" class="ml-2 bg-indigo-500 text-white px-3 py-1 text-sm rounded hover:bg-indigo-600">Update</button>
            </form>

            {{-- Tombol Hapus --}}
            <form action="{{ route('cart.remove', $item) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold" onclick="return confirm('Yakin ingin menghapus item ini?')">Hapus</button>
            </form>
        </div>

        {{-- Subtotal --}}
        <div class="w-full sm:w-auto text-right mt-4 sm:mt-0">
            <p class="font-semibold">Subtotal: Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
        </div>
    </div>
@empty
    <p class="text-center text-gray-500 py-8">Keranjang belanja Anda masih kosong.</p>
@endforelse

            @if($cartItems->isNotEmpty())
                <div class="text-right mt-6">
                    <h2 class="text-2xl font-bold">Total: Rp {{ number_format($total, 0, ',', '.') }}</h2>
                    <a href="{{ route('checkout.index') }}" class="mt-4 inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700">
                        Lanjut ke Checkout
                    </a>
                </div>
            @endif
        </div>
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mt-6 inline-block">&larr; Lanjut Belanja</a>
    </div>
</body>
</html>