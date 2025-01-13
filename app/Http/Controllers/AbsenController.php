<?php
namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absens = Absen::with('booking.event', 'booking.user')->get();
        $events = Event::all();
        
        return view('admin.absen.absen', compact('absens', 'events'));
    }

    public function updateAttendance(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|string|exists:bookings,unique_code',
        ]);

        $booking = Booking::where('unique_code', $request->unique_code)->first();
        if (!$booking) {
            return redirect()->back()->withErrors(['unique_code' => 'Booking not found.']);
        }

        if ($booking->status !== 'PAID') {
            return redirect()->back()->withErrors(['unique_code' => 'Booking is not paid.']);
        }

        $absen = Absen::where('booking_id', $booking->id)->first();
        if (!$absen) {  
            $absen = new Absen();
            $absen->booking_id = $booking->id;
        }
        $absen->status = 'attended'; 
        $absen->save();

        return redirect()->back()->with('success', 'Attendance updated successfully.');
    }
}