<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//booknow
Route::get('/booknow', function () {
    return view('livewire.booknow');
})->middleware(['auth', 'verified'])->name('booknow');

// Route to handle booking submission
Route::post('/book-flight', [BookingController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('bookflight');

//viewflights
Route::get('/viewflights', [FlightController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('viewflights');
//manage flights
Route::get('/my-bookings', [BookingController::class, 'myBookings'])
    ->middleware(['auth', 'verified'])
    ->name('my.bookings');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
