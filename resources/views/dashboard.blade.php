@extends('layouts.app')

@section('content')
<style>
    .stat-card {
        color: white;
        border-radius: 0.5rem;
        padding: 1.5rem;
        text-align: center;
    }
    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
    }
</style>

<div class="container-fluid px-5">
    <h2 class="mb-4 text-white">Parking System Dashboard</h2>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="stat-card bg-primary shadow">
                <div>Total Vehicles</div>
                <div class="stat-number">{{ $totalVehicles }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-success shadow">
                <div>Currenctly Parked</div>
                <div class="stat-number">{{ $currentlyParked }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-info shadow">
                <div>Available Spaces</div>
                <div class="stat-number">{{ $availableSpaces }}</div>
            </div>
        </div>
    </div>

    <!-- Schedule of recent activities -->
    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">
            Recent Activity
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Plate</th>
                        <th>Owner</th>
                        <th>Action</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentActivities as $activity)
                        <tr>
                            <td>{{ $activity->vehicle->license_plate }}</td>
                            <td>{{ $activity->vehicle->owner_name }}</td>
                            <td>{{ ucfirst($activity->action) }}</td>
                            <td>{{ $activity->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">There are no recent activities.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
