<?php

use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    $reservations = [];
    if (auth()->check()){
        $reservations = auth()->user()->reservations()->latest()->get();
    }
    return view('home', ['reservations' => $reservations]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

Route::post('/newReservation', [ReservationController::class, 'reservation']);
Route::post('/createReservation', [ReservationController::class,'createReservation']);
Route::get('/reservationDetails/{type}', [ReservationController::class, 'details'])->name('details');
Route::post('/saveReservation', [ReservationController::class, 'saveReservation']);
Route::get('/edit-reservation/{reservation}', [ReservationController::class, 'showEditScreen']);
Route::put('/edit-reservation/{reservation}', [ReservationController::class, 'updateReservation']);
Route::delete('/cancel-reservation/{reservation}', [ReservationController::class, 'cancelReservation']);