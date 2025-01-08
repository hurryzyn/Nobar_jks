<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan daftar pemesanan
    public function index()
    {
        // Mengambil semua data booking untuk user yang sedang login
        $bookings = Booking::where('user_id', Auth::id())->get();

        // Mengarahkan ke file booking/index.blade.php dan mengirimkan data bookings
        return view('booking.index', compact('bookings'));
    }

    // Menampilkan detail pemesanan
    public function show($id)
    {
        // Mengambil data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Pastikan booking milik user yang sedang login
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Mengarahkan ke file booking/show.blade.php dan mengirimkan data booking
        return view('booking.show', compact('booking'));
    }

    // Mengubah status pemesanan
    public function update(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'status' => 'required|in:paid,unpaid',
        ]);

        // Mengambil data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Pastikan booking milik user yang sedang login
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Mengubah status booking
        $booking->status = $request->input('status');
        $booking->save();

        return redirect()->route('booking.show', $id)->with('success', 'Booking status updated successfully.');
    }
}