@extends('layout')

@section('content')
<h2>Add Vehicle</h2>
<form action="{{ route('vehicles.store') }}" method="POST">
    @csrf
    <label>License Plate:</label>
    <input type="text" name="license_plate" required><br>
    <label>Owner Name:</label>
    <input type="text" name="owner_name" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" required><br>
    <button type="submit">Save</button>
</form>
@endsection
