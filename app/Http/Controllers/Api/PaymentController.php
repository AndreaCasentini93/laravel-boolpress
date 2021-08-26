<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    public function generateToken(Request $request, Gateway $gateway) {
        $token = $gateway->clientToken()->generate();
        $data = [
            'token' => $token,
        ];
        return response()->json($data);
    }

    public function makePayment(PaymentRequest $paymentrequest, Gateway $gateway) {
        $result = $gateway->transaction()->sale([
            'amount' => $paymentrequest->amount,
            'PaymentMethodNonce' => $paymentrequest->token,
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
            return response()->json($data,400);
        }
    }
}
