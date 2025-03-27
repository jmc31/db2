<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Carbon\Carbon;

class FlightController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        // Flights that are upcoming and still available for booking
        $availableFlights = Flight::where('departure_time', '>', $now)
            ->where('seats_available', '>', 0)
            ->orderBy('departure_time')
            ->get();

        // Flights that are currently in progress
        $currentFlights = Flight::where('departure_time', '<=', $now)
            ->where('arrival_time', '>', $now)
            ->orderBy('departure_time', 'desc')
            ->get();

        return view('livewire.viewflights', compact('availableFlights', 'currentFlights'));
    }
}
