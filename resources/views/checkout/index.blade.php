{{-- resources/views/checkout/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5">
        <h1 class="text-3xl font-bold mb-6 text-center">Formulir Checkout</h1>
        <div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="customer_name" id="customer_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label for="customer_email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                        <input type="email" name="customer_email" id="customer_email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label for="customer_phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" name="customer_phone" id="customer_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label for="customer_address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea name="customer_address" id="customer_address" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">
                        Buat Pesanan
                    </button>
                </div>
            </form>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('cart.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Keranjang</a>
        </div>
    </div>
</body>
</html>