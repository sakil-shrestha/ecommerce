<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            "full_name" => 'required',
            "phone" => 'required',
            "country" => 'required',
            "province" => 'required',
            "city" => 'required',
            "tole" => 'required',
        ]);

        $address = new Address();
        $address->user_id=Auth::user()->id;
        $address->full_name = $request->full_name;
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->tole = $request->tole;
        $address->postal_code=$request->postal_code;
        $address->save();
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
         $request->validate([
            "full_name" => 'required',
            "phone" => 'required',
            "country" => 'required',
            "province" => 'required',
            "city" => 'required',
            "tole" => 'required',
        ]);

        $address = Address::findorFail($id);
        $address->user_id=Auth::user()->id;
        $address->full_name = $request->full_name;
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->tole = $request->tole;
        $address->postal_code=$request->postal_code;
        $address->save();
        return redirect()->back();

    }
    public function delete($id)
    {
        $address=Address::findorFail($id);
        $address->delete();
        return redirect()->back();
    }
}
