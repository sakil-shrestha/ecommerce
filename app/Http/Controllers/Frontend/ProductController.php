<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products=Product::all();
        // $images=$products->product_images;
        $products = Product::with('product_images')->get();
        return view('frontend.product', compact('products'));
    }

    public function productdetail($slug)
    {
        $product = Product::where('slug', $slug)->with('product_images')->first();
        $category = $product->category;

        return view('frontend.productDetail', compact('product', 'category'));
    }
    public function search(Request $request)
    {
        $search = $request->search;

        $min_price = $request->min_price;
        $max_price = $request->max_price;

        //creating query builder instance
        $query = Product::with('product_images');

        if($request->filled('search'))
        {
            $query->where('name','like','%'.$search.'%');
        }


        if ($request->filled('category')) {
            $query->where('category_id', $request->category);

        }
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [$min_price, $max_price]);
        }

        if(!$request->filled('search') && !$request->filled('category') && !$request->filled('min_price') && !$request->filled('max_price'))
        {
            return redirect()->back();
        }
        $products = $query->get();
        return view('frontend.product', compact('products'));
    }
}
