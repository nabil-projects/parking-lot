<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\ParkingRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicles = Vehicle::count();
        $activeParkings = ParkingRecord::active()->count();
        $recentActivities = ParkingRecord::with('vehicle')
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalVehicles',
            'activeParkings',
            'recentActivities'
        ));
    }
}