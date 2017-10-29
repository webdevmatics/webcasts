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
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

// Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

// Create a Customer:
        $customer = \Stripe\Customer::create(array(
            "email"  => $request->email,
            "source" => $token,
        ));

// Charge the Customer instead of the card:
        $charge = \Stripe\Charge::create(array(
            "amount"   => 1100,
            "currency" => "usd",
            "customer" => $customer->id,
        ));

// YOUR CODE: Save the customer ID and other info in a database for later.
// 
		auth()->user()->update(['stripe_id'=>$customer->id]);

		auth()->user()->assignRole('subscriber');

		return redirect('/blog');


    }

}
