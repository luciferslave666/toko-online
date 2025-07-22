<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function success(Order $order)
    {
        // Pastikan hanya pemilik sesi yang benar yang bisa melihat halaman ini (opsional, untuk keamanan tambahan)
        // Logic ini bisa ditambahkan nanti saat ada sistem login

        return view('orders.success', ['order' => $order]);
    }
        public function index()
    {
        // Ambil semua pesanan, urutkan dari yang paling baru
        $orders = Order::latest()->get();

        return view('admin.orders.index', ['orders' => $orders]);
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:pending,paid,shipped,done',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }
        public function history()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();

        return view('orders.history', ['orders' => $orders]);
    }

}