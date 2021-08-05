<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContactMessage;
use App\Lead;

class LeadController extends Controller
{
    // VALIDATION
    private $mailValidationArray = [
        'name' => 'required|max:60',
        'email' => 'required|email|max:60',
        'message' => 'required'
    ];
    private $mailValidationMessages = [
        'name.required' => 'Inserisci nome!',
        'name.max' => 'Il nome non può contenere più di 60 caratteri!',
        'email.required' => 'Inserisci email!',
        'email.email' => 'L\'email inserita non è valida!',
        'email.max' => 'Il nome non può contenere più di 60 caratteri!',
        'message.required' => 'Inserisci messaggio!'
    ];

    // SEND MAIL
    public function store(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, $this->mailValidationArray, $this->mailValidationMessages);
        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors()
                ]
            );
        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to('admin@sito.it')->send(new ContactMessage($lead));

        return response()->json(
            [
                'success' => true
            ]
        );
    }
}
