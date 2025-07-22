{{-- resources/views/products/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-5">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">&larr; Kembali ke Katalog</a>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full rounded-lg">
                </div>
                <div>
                    <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-600 mb-6">{{ $product->description }}</p>
                    <p class="text-3xl font-light text-green-600 mb-2">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <p class="text-sm text-gray-500 mb-6">
                        Stok: {{ $product->stock }}
                    </p>
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf  {{-- Token keamanan Laravel, wajib ada --}}

                        <div class="flex items-center mb-6">
                            <label for="quantity" class="mr-4 font-semibold">Jumlah:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                                class="w-20 border border-gray-300 rounded-md p-2 text-center">
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>