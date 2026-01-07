<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request,$id)
    {
        $product=Product::findOrFail($id);
        $oldCart=Cart::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
        if($oldCart)
        {
            $oldCart->user_id=Auth::user()->id; //for testing purpose, later we will use auth()->id()
            $oldCart->product_id=$id;
            $oldCart->quantity=$oldCart->quantity+$request->quantity;
            $oldCart->amount=$product->price*$oldCart->quantity;
            $oldCart->save();
            return redirect()->back()->with('success','Product added to cart successfully');
        }
        $cart=new Cart();
        $cart->user_id=Auth::user()->id; //for testing purpose, later we will use auth()->id()
        $cart->product_id=$id;
        $cart->quantity=$request->quantity;
        $cart->amount=$product->price* $request->quantity;//for testing purpose, later we will calculate amount based
        $cart->save();
        return redirect()->back()->with('success','Product added to cart successfully');
    }

    public function cart()
    {
        $carts=Cart::where('user_id',Auth::user()->id)->get();
        // $product=$cart->product;
        return view('frontend.cart',compact('carts'));
    }

    public function delete($id)
    {
        $cart=Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success','Product removed from cart successfully');
    }
}
