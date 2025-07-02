<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
   
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_plate' => 'required|string|max:20',
            'owner_name' => 'required|string|max:100', // تأكد من وجود هذا الحقل
            'phone' => 'nullable|string|max:20',
            'vehicle_type' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:30'
        ]);

        Vehicle::create($validated);

        return redirect()->route('vehicles.index')
            ->with('success', 'The vehicle has been successfully added');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'license_plate' => 'required|unique:vehicles,license_plate,' . $vehicle->id,
            'owner_name' => 'required',
            'phone' => 'required',
        ]);

        $vehicle->update($request->only(['license_plate', 'owner_name', 'phone']));

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated.');
    }

    public function destroy($id)
    {
        Vehicle::destroy($id);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted.');
    }
}
