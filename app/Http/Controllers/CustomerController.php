<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function session(Request $request)
    {
        // Set data ke session
        $request->session();
        $request->session()->put('last_login', now());

        $products = Product::all();
        $categories = Categories::all();
        // $cart = session()->get('cart', []);

        return view('pages/customer/dashboard', compact('products', 'categories'));
    }
}
