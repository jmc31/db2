@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800">My Booked Flights</h1>

        @if ($bookings->isEmpty())
            <p class="text-gray-600 mt-4">You have no booked flights yet.</p>
        @else
            <div class="mt-6 bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">Flight</th>
                            <th class="border p-3 text-left">Departure</th>
                            <th class="border p-3 text-left">Destination</th>
                            <th class="border p-3 text-left">Date</th>
                            <th class="border p-3 text-left">Class</th>
                            <th class="border p-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td class="border p-3">{{ $booking->airline }}</td>
                                <td class="border p-3">{{ $booking->departure }}</td>
                                <td class="border p-3">{{ $booking->destination }}</td>
                                <td class="border p-3">{{ $booking->departure_date }}</td>
                                <td class="border p-3">{{ $booking->class }}</td>
                                <td class="border p-3 text-green-600 font-semibold">Confirmed</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
