<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\VehicleController;
Route::get('/dashboard', [ParkingController::class, 'dashboard'])->name('dashboard');
Route::get('/', [VehicleController::class, 'index']);
Route::resource('vehicles', VehicleController::class);
