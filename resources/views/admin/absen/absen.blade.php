@extends('admin.layout.master')
@include('admin.dashboard.sidebar')
@section('title', 'Attendance')
@section('content')
<div class="p-4 mt-8 sm:ml-64">
    <div class="p-4  mt-14">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Attendance</h1>
                <div class="mb-3">
                    <label for="eventFilter" class="form-label text-gray-900 dark:text-white">Filter by Event</label>
                    <select id="eventFilter" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">All Events</option>
                        {{-- @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="uniqueCode" class="form-label text-gray-900 dark:text-white">Enter Unique Code</label>
                    <div class="flex">
                        <input type="text" id="uniqueCode" name="uniqueCode" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter unique code">
                        <button id="submitCode" class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Event</th>
                                    <th scope="col" class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="bookingTableBody">
                                {{-- @foreach($bookings as $booking)
                                    @if($booking->status == 'not attended')
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $booking->user->name }}</th>
                                        <td class="px-4 py-3">{{ $booking->event->name }}</td>
                                        <td class="px-4 py-3">{{ $booking->status }}</td>
                                    </tr>
                                    @endif
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3 text-gray-900 dark:text-white">
                    {{-- Total: <span id="totalBookings">{{ $bookings->where('status', 'not attended')->count() }}</span> --}}
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    document.getElementById('submitCode').addEventListener('click', function() {
        const uniqueCode = document.getElementById('uniqueCode').value;
        if (uniqueCode) {
            fetch(`/admin/attendance/mark-attended`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: uniqueCode })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Status updated successfully');
                    location.reload();
                } else {
                    alert('Invalid code or error updating status');
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            alert('Please enter a unique code');
        }
    });

    document.getElementById('eventFilter').addEventListener('change', function() {
        const eventId = this.value;
        fetch(`/admin/attendance/filter?event_id=${eventId}`)
            .then(response => response.json())
            .then(data => {
                const bookingTableBody = document.getElementById('bookingTableBody');
                bookingTableBody.innerHTML = '';
                let totalBookings = 0;
                data.bookings.forEach(booking => {
                    if (booking.status === 'not attended') {
                        const row = document.createElement('tr');
                        row.classList.add('border-b', 'dark:border-gray-700');
                        row.innerHTML = `
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">${booking.user.name}</th>
                            <td class="px-4 py-3">${booking.event.name}</td>
                            <td class="px-4 py-3">${booking.status}</td>
                        `;
                        bookingTableBody.appendChild(row);
                        totalBookings++;
                    }
                });
                document.getElementById('totalBookings').innerText = totalBookings;
            })
            .catch(error => console.error('Error:', error));
    });
</script>
@endsection