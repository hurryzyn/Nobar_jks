<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\BookingMail;
use App\Mail\Kodemail;

class MailController extends Controller
{
    public function sendEmail($bookingId)
    {
        // Mengambil data booking dan payment berdasarkan bookingId
        $booking = DB::table('bookings')
                     ->join('payments', 'bookings.id', '=', 'payments.id')
                     ->where('bookings.id', $bookingId)
                     ->select('bookings.unique_code', 'bookings.name', 'bookings.email')
                     ->first();

        if ($booking) {
            $details = [
                'name' => $booking->name,
                'unique_code' => $booking->unique_code
            ];

            // Mengirim email
            Mail::to($booking->email)->send(new Kodemail($details));

            return response()->json(['message' => 'Email sent successfully!']);
        } else {
            return response()->json(['message' => 'Booking not found!'], 404);
        }
    }
}