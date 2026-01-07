<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products=Product::all();
        // $images=$products->product_images;
        $products=Product::with('product_images')->get();
        return view('frontend.product', compact('products'));
    }

    public function productdetail($slug)
    {
        $product=Product::where('slug',$slug)->with('product_images')->first();
        $category=$product->category;

        return view('frontend.productDetail', compact('product','category'));
    }
}
