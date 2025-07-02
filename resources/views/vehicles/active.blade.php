<!-- resources/views/parking/active.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Currently Parked Vehicles</h1>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Plate</th>
                            <th>Owner</th>
                            <th>Phone</th>
                            <th>Entry Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activeParkings as $record)
                        <tr>
                            <td>{{ $record->vehicle->plate }}</td>
                            <td>{{ $record->vehicle->owner }}</td>
                            <td>{{ $record->vehicle->phone }}</td>
                            <td>{{ $record->entry_time->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <form action="{{ route('parking.check-out', $record) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Check Out</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{ $activeParkings->links() }}
        </div>
    </div>
</div>
@endsection