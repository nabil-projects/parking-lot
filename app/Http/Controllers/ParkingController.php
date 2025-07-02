<?php

// app/Http/Controllers/ParkingController.php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\ParkingRecord;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function active()
    {
        $activeParkings = ParkingRecord::with('vehicle')
            ->active()
            ->latest()
            ->paginate(10);

        return view('parking.active', compact('activeParkings'));
    }

    public function checkIn(Vehicle $vehicle)
    {
        $record = ParkingRecord::create([
            'vehicle_id' => $vehicle->id,
            'entry_time' => now()
        ]);

        return redirect()->back()->with('success', 'Vehicle checked in successfully');
    }

    public function checkOut(ParkingRecord $record)
    {
        $record->update(['exit_time' => now()]);
        
        return redirect()->back()->with('success', 'Vehicle checked out successfully');
    }
    public function dashboard()
{
    $totalVehicles = Vehicle::count();
    $activeParkings = ParkingRecord::whereNull('exit_time')->count();
    $recentActivities = ParkingRecord::with('vehicle')
        ->latest()
        ->take(5)
        ->get();

    return view('parking.dashboard', compact(
        'totalVehicles',
        'activeParkings',
        'recentActivities'
    ));
}
}
