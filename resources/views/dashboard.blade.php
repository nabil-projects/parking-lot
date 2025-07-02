<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Parking System Dashboard</h1>
    
    <div class="row mb-4">
        <!-- Stats Cards -->
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Vehicles</h5>
                    <p class="card-text display-4">{{ $totalVehicles }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Currently Parked</h5>
                    <p class="card-text display-4">{{ $activeParkings }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Available Spaces</h5>
                    <p class="card-text display-4">50</p> <!-- Adjust based on your capacity -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="card">
        <div class="card-header">
            <h5>Recent Activity</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Plate</th>
                            <th>Owner</th>
                            <th>Action</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentActivities as $activity)
                        <tr>
                            <td>{{ $activity->vehicle->plate }}</td>
                            <td>{{ $activity->vehicle->owner }}</td>
                            <td>{{ $activity->exit_time ? 'Checked Out' : 'Checked In' }}</td>
                            <td>{{ $activity->exit_time ? $activity->exit_time : $activity->entry_time }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection