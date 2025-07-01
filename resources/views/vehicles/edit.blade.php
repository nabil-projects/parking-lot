@extends('layout')

@section('content')
<h2>Edit Vehicle</h2>
<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>License Plate:</label>
    <input type="text" name="license_plate" value="{{ $vehicle->license_plate }}" required><br>
    <label>Owner Name:</label>
    <input type="text" name="owner_name" value="{{ $vehicle->owner_name }}" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $vehicle->phone }}" required><br>
    <button type="submit">Update</button>
</form>
@endsection
