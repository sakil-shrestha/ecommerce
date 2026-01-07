<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function payment()
    {
        // DB::transaction(function(){


        $userId=Auth::user()->id;
        $carts=Cart::where('user_id',$userId)->get();
        $amount=$carts->sum('amount');
        $addressId=Auth::user()->addresses->first()->id;


        $response= Http::withHeaders([

            "Authorization" => 'Key 4452f872ff174e009401878db195734f'
        ])->post(env('KHALTI_BASE_URL') . 'epayment/initiate/',
                [
                    'return_url' => env('KHALTI_RETURN_URL'),
                    'website_url' => env('APP_URL'),
                    'amount' => $amount*100,
                    'purchase_order_id' => Auth::user()->id,
                    'purchase_order_name' => "laptop",

                ]
            );

            $carts->delete();

            return redirect($response['payment_url']);

        // });
    }
}
