<?php

namespace App\Http\Controllers;

use App\BillingInfo;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  public function index()
  {

      return view('checkout');
  }

  public function store(BillingInfoRequest $request)
  {

       $creator=Auth::user()->id;

      BillingInfo::create([
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'phone'=>$request->phone,
        'email'=>Auth::user()->email,
        'address'=>$request->address,
        'city'=>$request->city,
       'user_id'=>$creator,
       'message'=>$request->message,
       'payment_type'=>$request->payment_type,
      ]);


      return redirect (route('confirmation'));
  }
}
