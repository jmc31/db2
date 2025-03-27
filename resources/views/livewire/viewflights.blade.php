@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Flight Information</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Available Flights Section -->
        <div class="bg-gray-100 p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Available Flights</h3>

            @if($availableFlights->isEmpty())
                <p class="text-gray-500">No flights available at the moment.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-left text-gray-700 text-sm uppercase">
                                <th class="px-4 py-3 border">Airline</th>
                                <th class="px-4 py-3 border">Origin</th>
                                <th class="px-4 py-3 border">Destination</th>
                                <th class="px-4 py-3 border">Departure</th>
                                <th class="px-4 py-3 border">Seats</th>
                                <th class="px-4 py-3 border">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($availableFlights as $flight)
                            <tr class="border-t text-gray-700 text-sm">
                                <td class="px-4 py-3 border">{{ $flight->airline }}</td>
                                <td class="px-4 py-3 border">{{ $flight->origin }}</td>
                                <td class="px-4 py-3 border">{{ $flight->destination }}</td>
                                <td class="px-4 py-3 border">{{ $flight->departure_time }}</td>
                                <td class="px-4 py-3 border">{{ $flight->seats_available }}</td>
                                <td class="px-4 py-3 border">${{ number_format($flight->price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Current Flights Section (Live Flights) -->
        <div class="bg-gray-100 p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Current Flights</h3>

            @if($currentFlights->isEmpty())
                <p class="text-gray-500">No flights currently in progress.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-left text-gray-700 text-sm uppercase">
                                <th class="px-4 py-3 border">Airline</th>
                                <th class="px-4 py-3 border">From</th>
                                <th class="px-4 py-3 border">To</th>
                                <th class="px-4 py-3 border">Departure</th>
                                <th class="px-4 py-3 border">Arrival</th>
                                <th class="px-4 py-3 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($currentFlights as $flight)
                            <tr class="border-t text-gray-700 text-sm">
                                <td class="px-4 py-3 border">{{ $flight->airline }}</td>
                                <td class="px-4 py-3 border">{{ $flight->origin }}</td>
                                <td class="px-4 py-3 border">{{ $flight->destination }}</td>
                                <td class="px-4 py-3 border">{{ $flight->departure_time }}</td>
                                <td class="px-4 py-3 border">{{ $flight->arrival_time }}</td>
                                <td class="px-4 py-3 border text-green-600 font-semibold">{{ $flight->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
