<!-- filepath: /c:/laragon/www/lads-app/resources/views/cust/product/detail_product.blade.php -->
@extends('layout.master')
@section('title', 'Detail Ticket Payment')
@section('content')
  <h1 class="text-5xl text-center font-bold text-black mt-36">MATCHDAY</h1>
  <div class="max-w-6xl mb-20 mt-10 mx-auto p-8 bg-white rounded-lg shadow-lg" x-data="{ quantity: 1, isLoggedIn: {{ Auth::check() ? 'true' : 'false' }} }">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
          <!-- Gambar -->
          <div>
              <img src="{{ asset($event->photo) }}" alt="{{ $event->name }}" class="w-full rounded-lg shadow-md">
          </div>
          <!-- Detail -->
          <div class="flex flex-col justify-center"">
              <h2 class="text-2xl font-bold mb-4">{{ $event->name }}</h2>
              <p class="text-gray-700 mb-4">Stadium: {{ $event->location }}</p>
              <p class="text-gray-700 mb-4">Time: {{ $event->date }}</p>
              <p class="text-gray-700 mb-4">Location: {{ $event->location }}</p>
              <p class="text-gray-700 mb-4">Description: {{ $event->description }}</p>
              <div class="mt-6">
                  <form action="{{ route('book.ticket', $event->id) }}" method="POST">
                      @csrf
                      <div class="flex items-center gap-4">
                          <label for="quantity" class="font-semibold">Jumlah Tiket:</label>
                          <input type="number" id="quantity" name="quantity" min="1" class="border-gray-300 border rounded-lg p-2 w-20" x-model="quantity">
                      </div>
                      <button type="submit" class="mt-4 px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">Pesan Tiket</button>
                  </form>
                  <template x-if="!isLoggedIn">
                      <div class="mt-4 text-red-500 font-semibold">Silakan login terlebih dahulu untuk memesan tiket.</div>
                  </template>
              </div>
          </div>
      </div>
      <div class="mt-10 bg-gray-100 p-8 rounded-lg">
          <h3 class="text-xl font-semibold mb-8">Detail Transaksi</h3>
          <ul class="list-none text-gray-700">
              <li class="flex justify-between mb-4">
                  <span>Jumlah Tiket:</span>
                  <span x-text="quantity"></span>
              </li>
              <li class="flex justify-between mb-4">
                  <span>Harga per Tiket:</span>
                  <span>{{ $event->price ? 'Rp ' . number_format($event->price, 0, ',', '.') : 'Free' }}</span>
              </li>
              <li class="flex justify-between font-bold">
                  <span>Total:</span>
                  <span x-text="'Rp ' + (quantity * {{ $event->price ?? 0 }})"></span>
              </li>
          </ul>
      </div>
  </div>
@endsection