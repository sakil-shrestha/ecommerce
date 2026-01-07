<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::latest()->take(8)->get();

        return view('frontend.home', compact('products'));
    }
    public function about()
    {
        return view('frontend.about');
    }
}
