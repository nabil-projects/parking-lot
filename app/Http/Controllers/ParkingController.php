<?php

namespace App\Http\Controllers;

use App\Models\ParkingSpot;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function dashboard()
    {
        $totalSpots = ParkingSpot::count();

        // Use these two lines here:
        $occupiedSpots = ParkingSpot::where('status', 'occupied')->count();
        $availableSpots = ParkingSpot::where('status', 'available')->count();


        $vehicles = Vehicle::with('spot')->whereNull('exit_time')->get();

        return view('dashboard', compact('totalSpots', 'occupiedSpots', 'availableSpots'));
    }
}
