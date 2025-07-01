@extends('layout')

@section('content')
<h2 class="mb-4">Edit Vehicle</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">License Plate:</label>
        <input type="text" name="license_plate" class="form-control" value="{{ $vehicle->license_plate }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Owner Name:</label>
        <input type="text" name="owner_name" class="form-control" value="{{ $vehicle->owner_name }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone" class="form-control" value="{{ $vehicle->phone }}" required>
    </div>

    <button type="submit" class="btn btn-primary">💾 Update</button>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">↩️ Cancel</a>
</form>
@endsection
