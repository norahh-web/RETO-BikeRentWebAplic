<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BikeController::class, 'index'])->name('bikes.index');
Route::get('/bikes/{bike}', [BikeController::class, 'show'])->name('bikes.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/bikes/{bike}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/my-bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/my-bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

require __DIR__.'/auth.php';
