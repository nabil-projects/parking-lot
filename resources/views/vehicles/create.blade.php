@extends('layout')

@section('content')
<h2 class="mb-4">Add Vehicle</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vehicles.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">License Plate:</label>
        <input type="text" name="license_plate" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Owner Name:</label>
        <input type="text" name="owner_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">💾 Save</button>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">↩️ Back</a>
</form>
@endsection
