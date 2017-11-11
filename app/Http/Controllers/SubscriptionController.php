<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscribe');
    }

    public function store(Request $request)
    {
    
        $token =$request->stripeToken;
     
        auth()->user()->newSubscription('main','monthly')->withCoupon($request->coupon)->create($token);   

		auth()->user()->assignRole('subscriber');

		return redirect('/blog');


    }

}
