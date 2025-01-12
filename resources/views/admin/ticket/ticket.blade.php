<!-- filepath: /c:/laragon/www/lads-app/resources/views/admin/ticket/index.blade.php -->
@extends('admin.layout.master')
@section('title', 'Daftar Tiket')
@section('content')
@include('admin.dashboard.sidebar')
<div class="p-4 mt-8 sm:ml-64">
    <div class="p-4 mt-14">
        <h1 class="text-3xl font-bold mb-6">Daftar Tiket</h1>
        <div class="mb-3">
            <label for="eventFilter" class="form-label text-gray-900 dark:text-white">Filter by Event</label>
            <select id="eventFilter"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                onchange="filterTickets()">
                <option value="">All Events</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="w-full table-auto" id="ticketsTable">
                <thead>
                    <tr>
                        
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Event</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr data-event-id="{{ $ticket->event_id }}">
                        <td class="border px-4 py-2">
                            {{ 'Rp ' . number_format($ticket->price, 0, ',', '.') }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $ticket->event ? $ticket->event->name : 'Event not found' }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function filterTickets() {
        var filter = document.getElementById('eventFilter').value;
        var rows = document.querySelectorAll('#ticketsTable tbody tr');

        rows.forEach(function(row) {
            if (filter === "" || row.getAttribute('data-event-id') === filter) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
@endsection