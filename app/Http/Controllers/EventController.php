<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('admin.event.event', compact('events'));
    }
    // public function show($id)
    // {
    //     $event = Event::findOrFail($id);

    //     return view('cust.product.detail_product', compact('event'));
    // }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:6114',
        ]);
        
        $data = $request->all();
    

        if ($request->hasFile('photo')) {
            $filePath = $request->photo->store('images', 'public');            
            $data['photo'] = $filePath;
        }


        Event::create($data);


        return redirect()->route('event.index')->with('success', 'Event created successfully.');
    }



    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('event.index', compact('event'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Menyimpan file di folder 'images' dalam disk 'public'
            $photoPath = $request->file('photo')->store('images', 'public');
            // Menyimpan path relatif file di database
            $data['photo'] = $photoPath;
        }

        $event->update($data);

        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
}
