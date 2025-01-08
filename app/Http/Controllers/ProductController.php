<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() 
    {
        // Mengambil semua data event dari database
        $events = Event::all();

        // Mengarahkan ke file home.blade.php dan mengirimkan data events
        return view('home', compact('events'));
    }

    public function show($id)
    {
        // Mengambil data event berdasarkan ID
        $event = Event::findOrFail($id);

        // Mengarahkan ke file cust/detail_product.blade.php
        return view('cust.product.detail_product', compact('event'));
    }

    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        // Simpan file foto
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images', 'public');
        }

        // Simpan data event ke database
        $event = new Event();
        $event->name = $request->input('name');
        $event->date = $request->input('date');
        $event->location = $request->input('location');
        $event->price = $request->input('price');
        $event->photo = $photoPath;
        $event->description = $request->input('description');
        $event->save();

        return redirect()->route('home')->with('success', 'Event created successfully.');
    }

    public function bookTicket(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'quantity' => 'required|integer|min=1',
        ]);

        // Mengambil data event berdasarkan ID
        $event = Event::findOrFail($id);

        // Hitung total harga
        $totalPrice = $event->price * $request->input('quantity');

        // Simpan booking ke database
        $booking = new Booking();
        $booking->event_id = $event->id;
        $booking->user_id = Auth::id();
        $booking->ticket_id = 1; // Sesuaikan dengan logika Anda
        $booking->quantity = $request->input('quantity'); // Menggunakan kolom quantity
        $booking->price = $totalPrice;
        $booking->status = 'unpaid';
        $booking->save();

        // Integrasi dengan Xendit untuk membuat invoice
        // (Tambahkan logika integrasi Xendit di sini)

        return redirect()->route('product.show', $id)->with('success', 'Ticket booked successfully.');
    }
}