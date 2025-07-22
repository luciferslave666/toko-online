<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- Import model Product

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil semua produk, atau batasi jumlahnya jika perlu
        $products = Product::latest()->get(); 
        
        // Kirim data $products ke view 'landing'
        return view('landing', ['products' => $products]);
    }
}