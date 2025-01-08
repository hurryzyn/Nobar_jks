<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data event dari database
        $events = Event::orderBy('date', 'asc')->get();

        // Mengirimkan data ke view home
        return view('layout.home', compact('events'));
    }
}
