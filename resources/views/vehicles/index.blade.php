@extends('layout')

@section('content')
<h2>Vehicles List</h2>
<a href="{{ route('vehicles.create') }}">➕ Add New Vehicle</a>
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Plate</th>
        <th>Owner</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->id }}</td>
            <td>{{ $vehicle->license_plate }}</td>
            <td>{{ $vehicle->owner_name }}</td>
            <td>{{ $vehicle->phone }}</td>
            <td>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}">✏️ Edit</a>
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" type="submit">🗑️ Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
