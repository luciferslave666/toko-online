<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
DB::commit();

class CheckoutController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        // Jika keranjang kosong, jangan biarkan ke checkout
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('error', 'Keranjang Anda kosong, silakan belanja dulu.');
        }

        return view('checkout.index');
    }
    public function store(Request $request)
    {
        // 1. Validasi data dari form
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
        ]);

        $sessionId = Session::getId();
        $cartItems = Cart::with('product')->where('session_id', $sessionId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Mulai transaksi database untuk memastikan semua proses berhasil
        DB::beginTransaction();

        try {
            // 2. Hitung total harga dari keranjang
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // 3. Simpan data ke tabel 'orders'
            $order = Order::create([
                'user_id' => auth()->check() ? auth()->id() : null, // <-- Tambahkan ini
                'customer_name' => auth()->check() ? auth()->user()->name : $request->customer_name, // <-- Ubah ini
                'customer_email' => auth()->check() ? auth()->user()->email : $request->customer_email, // <-- Ubah ini
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            // 4. Pindahkan setiap item dari keranjang ke 'order_items'
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price, // Simpan harga saat itu
                ]);
            }

            // 5. Kosongkan keranjang belanja pengguna
            Cart::where('session_id', $sessionId)->delete();

            // Jika semua berhasil, konfirmasi transaksi
            DB::commit();

            // Redirect ke halaman sukses (akan kita buat selanjutnya)
            return redirect()->route('order.success', $order);

        } catch (\Exception $e) {
            // Jika terjadi error, batalkan semua perubahan
            DB::rollBack();
            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pesanan Anda. Silakan coba lagi.');
        }
    }
}