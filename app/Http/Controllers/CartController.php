<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        // 1. Dapatkan session ID, atau buat baru jika tidak ada
        $sessionId = Session::getId();

        // 2. Cari item di keranjang berdasarkan session dan produk
        $cartItem = Cart::where('session_id', $sessionId)
                        ->where('product_id', $product->id)
                        ->first();

        $quantity = $request->input('quantity', 1); // Ambil jumlah dari form, default 1

        if ($cartItem) {
            // Jika item sudah ada, update jumlahnya
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Jika item belum ada, buat baris baru
            Cart::create([
                'session_id' => $sessionId,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
     public function index()
    {
        $sessionId = Session::getId();
        $cartItems = Cart::with('product') // Eager load relasi produk
                        ->where('session_id', $sessionId)
                        ->get();

        // Hitung total harga
        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        return view('cart.index', [
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }
        public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Jumlah barang berhasil diperbarui.');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}