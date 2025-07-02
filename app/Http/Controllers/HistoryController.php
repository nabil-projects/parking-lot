<?php

// app/Http/Controllers/HistoryController.php
namespace App\Http\Controllers;

use App\Models\ParkingRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = ParkingRecord::with('vehicle')
            ->completed()
            ->latest();

        if ($request->has('plate')) {
            $query->whereHas('vehicle', function($q) use ($request) {
                $q->where('plate', 'like', '%'.$request->plate.'%');
            });
        }

        if ($request->has('date')) {
            $query->whereDate('entry_time', Carbon::parse($request->date));
        }

        $records = $query->paginate(15);

        return view('history.index', compact('records'));
    }

    public function export(Request $request)
    {
        // Similar filtering logic as index()
        $records = ParkingRecord::with('vehicle')
            ->completed()
            ->latest()
            ->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=parking_history.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function() use ($records) {
            $file = fopen('php://output', 'w');
            
            // CSV headers
            fputcsv($file, ['Plate', 'Owner', 'Check-in', 'Check-out', 'Duration']);
            
            // Data rows
            foreach ($records as $record) {
                $duration = $record->entry_time->diff($record->exit_time)->format('%H:%I:%S');
                
                fputcsv($file, [
                    $record->vehicle->plate,
                    $record->vehicle->owner,
                    $record->entry_time->format('Y-m-d H:i:s'),
                    $record->exit_time->format('Y-m-d H:i:s'),
                    $duration
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
