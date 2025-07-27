<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product; // <-- Import model Product

class LandingPageController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $products = Product::latest()->get(); 
        
        // Pass the $products variable to the 'landing' view
        return view('landing', ['products' => $products]);
    }
}