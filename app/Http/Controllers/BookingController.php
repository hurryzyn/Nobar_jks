<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Support\Str;
use Xendit\Xendit;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;

class BookingController extends Controller
{

    public function checkout($id)
    {
        $user = Auth::user();
        $event = Event::findOrFail($id);
        

        return view('cust.product.chekout', compact('event' , 'user'));
    }
    // public function __construct($id)
    // {
    //     Configuration::setXenditKey("xnd_development_ondTrBbmN2mRfY9tZnAzn5TQqI2bRyzCJ9CWh1q1vHPrV55eXeC2yyIYQoXF7d");
    // }
    public function payment(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $uuid = (string) Str::uuid();


        $apiInstance = new InvoiceApi();
        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => $uuid,
            'description' => $event->description,
            'amount' => $event->price,
            'currency' => 'IDR',

            "customer" => array(
                "given_names" => "John",
                "email" => "johndoe@example.com",
            ),
            "success_redirect_url" => "https://localhost:8000",
            "failure_redirect_url" => "https://localhost:8000",
        ]);
        try {
            $result = $apiInstance->createInvoice($create_invoice_request);

            $booking = new Booking();
            $booking->event_id = $request->event_id;
            $booking->checkout_link = $result['invoice_url'];
            $booking->external_id = $uuid;
            $booking->status = 'unpaid';
            $booking->save();
        } catch (\Xendit\XenditSdkException $e) {
        }
    }
}
