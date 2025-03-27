@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800">Welcome to Your Dashboard</h1>
        <p class="text-gray-600 mt-2">Manage your flights, check schedules, and book your next trip.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <!-- Book a Flight -->
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full">
                    ✈️
                </div>
                <h3 class="text-lg font-semibold mt-4">Book a Flight</h3>
                <a href="{{ route('booknow') }}" class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                    Book Now
                </a>
            </div>

            <!-- My Bookings -->
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
                <div class="w-16 h-16 bg-green-100 text-green-600 flex items-center justify-center rounded-full">
                    📅
                </div>
                <h3 class="text-lg font-semibold mt-4">Current Flights</h3>
                <a href="{{ route('viewflights') }}" class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                    View Flights
                </a>
            </div>

            <!-- My Booked Flights -->
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
                <div class="w-16 h-16 bg-yellow-100 text-yellow-600 flex items-center justify-center rounded-full">
                    📋
                </div>
                <h3 class="text-lg font-semibold mt-4">My Booked Flights</h3>
                <a href="{{ route('my.bookings') }}" class="mt-4 px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded-md hover:bg-yellow-700 transition">
                    View My Flights
                </a>
            </div>

        </div>
    </div>
@endsection
