<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request,$product_id)
    {
        $request->validate([
            'rating'=>'required',
        ]);
        $review=Review::create([
            'product_id'=>$product_id,
            'user_id'=>Auth::user()->id,
            'rating'=>$request->rating,
            'review'=>$request->review,
        ]);
        return redirect()->back();
    }
}
