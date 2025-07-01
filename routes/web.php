<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\VehicleController;
Route::get('/', [VehicleController::class, 'index']);
Route::resource('vehicles', VehicleController::class);
