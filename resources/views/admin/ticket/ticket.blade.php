@extends('admin.layout.master')
@include('admin.dashboard.sidebar')
@section('content')
    <div class="p-4 mt-8 sm:ml-64">
        <div class="p-4  mt-14">
            <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Tickets</h1>
                    <div class="mb-3">
                        <label for="eventFilter" class="form-label text-gray-900 dark:text-white">Filter by Event</label>
                        <select id="eventFilter"
                            class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            onchange="filterTickets()">
                            <option value="">All Events</option>
                            {{-- @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">ID</th>
                                        <th scope="col" class="px-4 py-3">Event Name</th>
                                        <th scope="col" class="px-4 py-3">User Name</th>
                                        <th scope="col" class="px-4 py-3">Price</th>
                                        <th scope="col" class="px-4 py-3">Status</th>
                                        <th scope="col" class="px-4 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($tickets as $ticket)
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $ticket->id }}</th>
                                            <td class="px-4 py-3">{{ $ticket->event->name }}</td>
                                            <td class="px-4 py-3">{{ $ticket->user->name }}</td>
                                            <td class="px-4 py-3">{{ $ticket->price }}</td>
                                            <td class="px-4 py-3">{{ $ticket->status }}</td>
                                            <td class="px-4 py-3 flex items-center justify-end space-x-2">
                                                <a href="{{ route('tickets.edit', $ticket->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-500 dark:hover:text-indigo-400">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536M9 11l3.536-3.536m0 0L15.232 5.232m-3.536 3.536L9 11m0 0L4.5 15.5m0 0L3 21l5.5-1.5m0 0L15 9m0 0l3.536-3.536m0 0L21 3m-3.536 3.536L15 9">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:text-red-400">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        function filterTickets() {
            var eventId = document.getElementById('eventFilter').value;
            window.location.href = "{{ url('admin/tickets') }}?event_id=" + eventId;
        }
    </script>
@endsection
