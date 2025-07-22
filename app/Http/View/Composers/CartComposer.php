<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Cek apakah aplikasi berjalan di console (seperti saat menjalankan migrate)
        if (app()->runningInConsole()) {
            // Jika ya, jangan lakukan apa-apa untuk menghindari error session
            $cartCount = 0;
        } else {
            // Jika tidak, hitung jumlah item di keranjang
            $sessionId = Session::getId();
            // Gunakan sum('quantity') untuk menghitung total item, bukan hanya jenis produknya
            $cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
        }

        $view->with('cartCount', $cartCount);
        $hasOrders = false;
    if (auth()->check()) {
        $hasOrders = auth()->user()->orders()->exists();
    }
    $view->with('hasOrders', $hasOrders);
    }
    
}