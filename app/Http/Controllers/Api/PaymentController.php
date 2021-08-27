<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    public function generateToken(Request $request) {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $token = $gateway->clientToken()->generate();
        $data = [
            'token' => $token,
        ];
        return response()->json($data);
    }

    public function makePayment(PaymentRequest $paymentrequest) {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $paymentrequest->amount,
            'paymentMethodNonce' => $paymentrequest->token,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'Pagamento effettuato!'
            ];
            return response()->json($data,200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Pagamento non effettuato!'
            ];
            return response()->json($data,401);
        }
    }
}

// {
//     "token": "fake-valid-nonce",
//     "amount": "12.00"
// }