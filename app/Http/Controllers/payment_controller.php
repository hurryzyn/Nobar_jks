<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\XenditSdkException;
use Xendit\Invoice;
use App\Models\Payment;
class payment_controller extends Controller
{
    public function __construct($id) {
        Configuration::setXenditKey("xnd_development_ondTrBbmN2mRfY9tZnAzn5TQqI2bRyzCJ9CWh1q1vHPrV55eXeC2yyIYQoXF7d");
    }

    public function create_payment(Request $request) {
        $params = [

            'external_id' => (string) Str::uuid(),
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
            'redirect_url' => 'http://localhost:8000/payment/callback',
        ];

        // $createInvoice = \Xendit\Invoice::create($params);

        $payment = new Payment();
        $payment->status='PENDING';
        $payment->external_id=$params['id'];
        $payment->save();
        
        return response()->json(['data'=>$createInvoice['invoice_url']]);    
    }
}
