@extends('admin.layout.master')
@include('admin.dashboard.sidebar')
@section('title', 'Attendance')
@section('content')
    <div class="p-4 mt-8 sm:ml-64">
        <div class="p-4 mt-14">
            <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Attendance</h1>
                    <div class="mb-3">
                        <label for="eventFilter" class="form-label text-gray-900 dark:text-white">Filter by Event</label>
                        <select id="eventFilter"
                            class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            onchange="filterAbsens()">
                            <option value="">All Events</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="uniqueCode" class="form-label text-gray-900 dark:text-white">Enter Unique Code</label>
                        <form action="{{ route('absen.updateAttendance') }}" method="POST">
                            @csrf
                            <div class="flex">
                                <input type="text" id="uniqueCode" name="unique_code"
                                    class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Enter unique code">
                                <button type="submit"
                                    class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                            </div>
                        </form>
                    </div>
                    @if ($errors->any())
                        <div class="text-red-500 mb-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="text-green-500 mb-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <table class="w-full table-auto" id="absensTable">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nama Pengguna</th>
                                    <th class="px-4 py-2">Event</th>
                                    <th class="px-4 py-2">Status Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absens as $absen)
                                    <tr data-event-id="{{ $absen->booking->event_id }}">
                                        <td class="border px-4 py-2">{{ $absen->booking->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $absen->booking->event->name }}</td>
                                        <td class="border px-4 py-2">{{ $absen->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        function filterAbsens() {
            var filter = document.getElementById('eventFilter').value;
            var rows = document.querySelectorAll('#absensTable tbody tr');

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
