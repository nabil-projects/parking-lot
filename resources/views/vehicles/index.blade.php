@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Vehicles</h2>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">➕ Add Vehicle</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover bg-white">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Plate</th>
            <th>Owner</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->id }}</td>
            <td>{{ $vehicle->license_plate }}</td>
            <td>{{ $vehicle->owner_name }}</td>
            <td>{{ $vehicle->phone }}</td>
            <td>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger">🗑️ Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
