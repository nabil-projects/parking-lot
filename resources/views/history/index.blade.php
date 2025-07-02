<!-- resources/views/history/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Parking History</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('history.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="plate">Plate Number</label>
                            <input type="text" class="form-control" id="plate" name="plate" 
                                   value="{{ request('plate') }}" placeholder="Search by plate">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" 
                                   value="{{ request('date') }}">
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary mr-2">Filter</button>
                        <a href="{{ route('history.index') }}" class="btn btn-secondary mr-2">Reset</a>
                        <a href="{{ route('history.export') }}?{{ http_build_query(request()->query()) }}" 
                           class="btn btn-success">Export to CSV</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Plate</th>
                            <th>Owner</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            <td>{{ $record->vehicle->plate }}</td>
                            <td>{{ $record->vehicle->owner }}</td>
                            <td>{{ $record->entry_time->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $record->exit_time->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $record->entry_time->diff($record->exit_time)->format('%H:%I:%S') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{ $records->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection