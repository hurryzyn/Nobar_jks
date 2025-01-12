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
       
        $events = Event::all();

        return view('home', compact('events'));
    }

    // Menampilkan detail pemesanan
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('cust.product.detail_product', compact('event'));
    }    
}