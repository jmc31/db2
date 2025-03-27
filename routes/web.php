<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//viewbookings
Route::get('/viewflights', function () {
    return view('livewire.viewflights');
})->middleware(['auth', 'verified'])->name('viewflights');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
