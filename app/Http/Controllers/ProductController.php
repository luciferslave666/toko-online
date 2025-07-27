<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
         // Mulai query ke model Product
    $query = Product::query();

    // Jika ada input pencarian 'search'
    if ($request->has('search') && $request->search != '') {
        // Lakukan pencarian berdasarkan nama produk
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Ambil hasilnya, urutkan dari yang terbaru
    $products = $query->latest()->get();

    // Kirim data ke view
    return view('products.index', [
        'products' => $products,
        'search' => $request->search ?? '' // Kirim keyword pencarian kembali ke view
    ]);
    }
}