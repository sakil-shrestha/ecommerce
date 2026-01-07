<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function checkout()
    {
        $carts = Cart::all();
        $address = Address::first();
        return view('frontend.checkout', compact('carts', 'address'));
    }

    public function order(Request $request)
    {
        // DB::transaction(function(){


        $userId = Auth::user()->id;
        $carts = Cart::where('user_id', $userId)->get();
        $amount = $carts->sum('amount');
        $addressId = Auth::user()->addresses->first()->id;


        $response = Http::withHeaders([

            "Authorization" => 'Key 4452f872ff174e009401878db195734f'
        ])->post(
            env('KHALTI_BASE_URL') . 'epayment/initiate/',
            [
                'return_url' => env('KHALTI_RETURN_URL'),
                'website_url' => env('APP_URL'),
                'amount' => $amount * 100,
                'purchase_order_id' => Auth::user()->id,
                'purchase_order_name' => "laptop",

            ]
        );



        $order = Order::create([
            'user_id' => $userId,
            'address_id' => $addressId,
            'total_amount' => $amount,
            'status' => 'pending',
        ]);
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return redirect($response['payment_url']);



        // });
    }

    public function paymentCallback(Request $request)
    {
        if($request->status=='Completed')
        {
            return redirect()->route('home')->with('success','Payment successful');

        }
        else{
            return redirect()->route('home')->with('error','Payment failed');
        }
    }
}
