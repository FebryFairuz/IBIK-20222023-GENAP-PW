<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function invoice(Request $request){
        $token = $request->token;
        list($header, $payload, $signature) = explode (".", $token);
        $returnToken = base64_decode($payload);
        $decodeTokenID = json_decode($returnToken);
        return view('private.payments.invoice')->with(['invoice'=>$decodeTokenID, "token"=>$token]);
    }

}
