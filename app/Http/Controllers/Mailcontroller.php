<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\BookingMail;
use App\Mail\Kodemail;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function sendEmail($bookingId)
    {
         $booking = DB::table('bookings')
         ->where('id', $bookingId)
         ->where('user_id', Auth::id()) 
         ->select('unique_code')
         ->first();

     if ($booking) {
         $details = [
             'name' => Auth::user()->name,       
             'unique_code' => $booking->unique_code,
         ];

         Mail::to(Auth::user()->email)->send(new Kodemail($details));

         return response()->json(['message' => 'Email sent successfully!']);
     } else {
         return response()->json(['message' => 'Booking not found or not authorized'], 404);
     }
    }
}