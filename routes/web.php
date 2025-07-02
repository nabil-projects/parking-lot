<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\VehicleController;

// الصفحة الرئيسية تحيل إلى لوحة التحكم
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// إدارة المركبات
Route::resource('vehicles', VehicleController::class)->except(['show']);
Route::get('/vehicles/active', [VehicleController::class, 'active'])->name('vehicles.active');
Route::post('/vehicles/{vehicle}/checkout', [VehicleController::class, 'checkout'])->name('vehicles.checkout');

// إدارة الوقوف
Route::prefix('parking')->group(function () {
    Route::get('active', [ParkingController::class, 'active'])->name('parking.active');
    Route::post('check-in/{vehicle}', [ParkingController::class, 'checkIn'])->name('parking.check-in');
    Route::post('check-out/{record}', [ParkingController::class, 'checkOut'])->name('parking.check-out');
});

// السجل
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/history/export', [HistoryController::class, 'export'])->name('history.export');
