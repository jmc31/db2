@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md px-8 py-6 bg-white shadow-xl rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Book Your Flight</h1>

        <form class="space-y-4" method="POST" action="{{ route('bookflight') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border rounded-md text-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border rounded-md text-sm" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" class="w-full px-3 py-2 border rounded-md text-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" name="age" class="w-full px-3 py-2 border rounded-md text-sm" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Departure Location</label>
                <input type="text" name="departure" class="w-full px-3 py-2 border rounded-md text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Destination Location</label>
                <input type="text" name="destination" class="w-full px-3 py-2 border rounded-md text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Airline</label>
                <select name="airline" class="w-full px-3 py-2 border rounded-md text-sm" required>
                    <option value="Philippine Airlines">Philippine Airlines</option>
                    <option value="Emirates">Emirates</option>
                    <option value="Qatar Airways">Qatar Airways</option>
                    <option value="Singapore Airlines">Singapore Airlines</option>
                    <option value="Cathay Pacific">Cathay Pacific</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Trip Type</label>
                <select id="trip_type" name="trip_type" class="w-full px-3 py-2 border rounded-md text-sm" required>
                    <option value="one-way">One-Way</option>
                    <option value="return">Return</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Class</label>
                <select name="class" class="w-full px-3 py-2 border rounded-md text-sm" required>
                    <option value="Economy">Economy</option>
                    <option value="Business">Business Class</option>
                    <option value="First Class">First Class</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Departure Date</label>
                    <input type="date" name="departure_date" class="w-full px-3 py-2 border rounded-md text-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Return Date</label>
                    <input type="date" name="return_date" id="return_date" class="w-full px-3 py-2 border rounded-md text-sm" disabled>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Departure Time</label>
                <input type="datetime-local" name="departure_time" class="w-full px-3 py-2 border rounded-md text-sm" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md">
                Book Now
            </button>
        </form>

    </div>
</div>

<script>
    document.getElementById('trip_type').addEventListener('change', function () {
        document.getElementById('return_date').disabled = this.value === 'one-way';
    });
</script>
@endsection
