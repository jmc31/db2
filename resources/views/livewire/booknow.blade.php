@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md px-8 py-6 bg-white shadow-xl rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Book Your Flight</h1>

        <form class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Trip Type</label>
                <select id="trip_type" class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="one-way">One-Way</option>
                    <option value="return">Return</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Class</label>
                <select class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="economy">Economy</option>
                    <option value="business">Business Class</option>
                    <option value="first-class">First Class</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Departure Date</label>
                    <input type="date" class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Return Date</label>
                    <input type="date" id="return_date" class="w-full px-3 py-2 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500" disabled>
                </div>
            </div>

            <button type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition shadow-md">
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
