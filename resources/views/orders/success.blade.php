{{-- resources/views/orders/success.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-10 rounded-lg shadow-lg text-center max-w-lg">
            <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Terima Kasih!</h1>
            <p class="text-gray-600 mb-6">Pesanan Anda telah berhasil kami terima.</p>

            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
                <p class="text-sm text-gray-500">Nomor Pesanan Anda:</p>
                <p class="text-2xl font-mono font-bold text-blue-600">#{{ $order->id }}</p>
            </div>

            <div class="text-left mb-6">
                <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Total Pembayaran:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
            </div>

            <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">
                Lanjut Belanja
            </a>
        </div>
    </div>
</body>
</html>