@extends('layout.master')
@section('title', 'Detail Ticket Payment')
@section('content')
    <h1 class="text-5xl text-center font-bold text-black mt-36">MATCHDAY</h1>
    <div class="max-w-6xl mb-20 mt-10 mx-auto p-8 bg-white rounded-lg shadow-lg" x-data="{ quantity: 1, isLoggedIn: {{ Auth::check() ? 'true' : 'false' }} }">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div>
                <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}"
                    class="w-full rounded-lg shadow-md">
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="text-2xl font-bold mb-4">{{ $event->name }}</h2>
                <p class="text-gray-700 mb-4">Stadium: {{ $event->location }}</p>
                <p class="text-gray-700 mb-4">Time: {{ date('d-m-Y', strtotime($event->date)) }}</p>
                <p class="text-gray-700 mb-4">Location: {{ $event->location }}</p>
                <p class="text-gray-700 mb-4">Description: {{ $event->description }}</p>
                <p class="text-gray-700 mb-4">Price:
                    {{ $event->price ? 'Rp ' . number_format($event->price, 0, ',', '.') : 'Free' }}</p>
                <a href="{{ route('checkout', $event->id) }}">
                    <button
                        class="mt-4 px-6 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition">
                        Checkout
                    </button>
                </a>
            </div>
        </div>
    </div>

@endsection
