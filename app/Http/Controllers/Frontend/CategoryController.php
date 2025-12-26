<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryProducts($slug)
    {
        $category=Category::where('slug',$slug)->first();
        $products=$category->products;
       
        if($products->isEmpty())
        {
            return "No products found in this category.";
        }
        else{
            return view('frontend.product',compact('products'));
        }

    }
}
