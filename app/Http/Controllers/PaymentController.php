<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'nullable|string',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $validated['amount'] * 100,
            'currency' => $validated['currency'] ?? 'usd',
        ]);
    
        return response()->json(['client_secret' => $paymentIntent->client_secret]);
    }
}
