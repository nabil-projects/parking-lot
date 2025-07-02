@extends('layout')

@section('content')
<h2 class="mb-4 text-light">Add Vehicle :</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vehicles.store') }}" method="POST" class="p-4 rounded shadow-sm" style="background-color: #2e415a;">
    @csrf
    <div class="mb-3">
        <label class="form-label text-light">License Plate:</label>
        <input type="text" name="license_plate" class="form-control bg-dark text-light border-0" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-light">Owner Name:</label>
        <input type="text" name="owner_name" class="form-control bg-dark text-light border-0" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-light">Phone:</label>
        <input type="text" name="phone" class="form-control bg-dark text-light border-0" required>
    </div>

    <button type="submit" class="btn btn-success me-2">Save</button>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">↩ Back</a>
</form>
@endsection
