<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Xendit\Xendit;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;;


class BookingController extends Controller
{

    public function __construct()
    {
        Configuration::setXenditKey("xnd_development_ondTrBbmN2mRfY9tZnAzn5TQqI2bRyzCJ9CWh1q1vHPrV55eXeC2yyIYQoXF7d");
    }
    public function index()
    {
        
        $bookings = Booking::all();
        $events = Event::all();

        
        return view('admin.ticket.ticket', compact('bookings' , 'events'));
    }
    public function checkout($id)
    {
        $user = Auth::user();
        $event = Event::findOrFail($id);


        return view('cust.product.chekout', compact('event', 'user'));
    }
    public function payment(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $uuid = (string) Str::uuid();

        // Buat objek Invoice API
        $apiInstance = new InvoiceApi();
        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => $uuid,
            'description' => $event->description,
            'amount' => $event->price * $request->quantity,
            'currency' => 'IDR',
            "customer" => array(
                "given_names" => $request->name,
                "email" => $request->email,
            ),
            "success_redirect_url" => "http://localhost:8000/notif/{$uuid}",
            "failure_redirect_url" => "http://localhost:8000/",
        ]);

        try {
            // Buat invoice menggunakan API
            $result = $apiInstance->createInvoice($create_invoice_request);

            if (isset($result['status']) && $result['status'] == 'settled') {
                return response()->json('payment anda di proses');
            }
            // Generate unique_code dengan loop untuk memastikan unik
            do {
                $uniqueCode = rand(100000, 999999);
            } while (Booking::where('unique_code', $uniqueCode)->exists());

            // Buat booking baru
            $booking = new Booking();
            $booking->event_id = $request->event_id;
            $booking->user_id = Auth::id();
            $booking->quantity = $request->quantity;
            $booking->checkout_link = $result['invoice_url'];
            $booking->external_id = $uuid;
            $booking->status = 'unpaid';
            $booking->unique_code = $uniqueCode; // Assign unique_code

            // Simpan ke database
            $booking->save();

            // Redirect atau berikan respon berhasil
            return redirect($result['invoice_url']);
        } catch (\Xendit\XenditSdkException $e) {
            // Tangani error
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function notif($id)
    {
        $apiInstance = new InvoiceApi();

        $result = $apiInstance->getInvoices(null, $id);

        $booking = Booking::where('external_id', $id)->first();

        if (isset($result['status']) && $result['status'] == 'settled') {
            return response()->json('payment anda di proses');
        }

        $booking->status = $result[0]['status'];
        $booking->save();

        $mailcontroller = new MailController();
        $mailcontroller->sendEmail($booking->id);

        return redirect('/')->with('success', 'Pembayaran anda berhasil');
    }
}
