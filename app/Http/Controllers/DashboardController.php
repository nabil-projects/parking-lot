<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\ParkingRecord;
use App\Models\ActivityLog;
use App\Models\ParkingSession;

class DashboardController extends Controller
{
   

public function index()
{
    $totalVehicles = Vehicle::count();
    $currentlyParked = ParkingSession::whereNull('check_out')->count();
    $availableSpaces = 50 - $currentlyParked; 

    $recentActivities = ActivityLog::with('vehicle')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalVehicles',
        'currentlyParked',
        'availableSpaces',
        'recentActivities'
    ));
}

}