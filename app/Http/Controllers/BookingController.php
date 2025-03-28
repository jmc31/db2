<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer|min:1',
            'departure' => 'required|string',
            'destination' => 'required|string',
            'airline' => 'required|string',
            'trip_type' => 'required|string',
            'class' => 'required|string',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:Y-m-d H:i:s',
            'return_date' => 'nullable|date',
        ]);

        Flight::create($validated);($request->all());

        return redirect()->route('viewflights')->with('success', 'Flight booked successfully!');
    }

    public function myBookings()
    {
        $bookings = Flight::where('email', Auth::user()->email)->get();
        return view('livewire.my-bookings', compact('bookings'));
    }
}
