<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.form');
    }

    public function processPayment(Request $request)
    {
        // Here you would integrate with a payment gateway
        // For demo purposes, we'll just log the request and return a success response

        Log::info('Payment data:', $request->all());

        return response()->json(['message' => 'Payment successful'], 200);
    }
}
