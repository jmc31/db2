<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // ADD THIS LINE
});

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

    Route::post('/generate-otp', function (Request $request) {
        $otp = rand(100000, 999999); // Generate 6-digit OTP
        Session::put('otp', $otp);

        return response()->json(['otp' => $otp]);
    });

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email'); // Generates and sends OTP

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update'); // Updates the password

require __DIR__.'/auth.php';
