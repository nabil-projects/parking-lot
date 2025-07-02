<?php

// app/Models/ParkingRecord.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkingRecord extends Model
{
protected $fillable = ['vehicle_id', 'entry_time', 'exit_time'];

public function vehicle(): BelongsTo
{
    return $this->belongsTo(Vehicle::class);
}

public function scopeActive($query)
{
    return $query->whereNull('exit_time');
}

public function scopeCompleted($query)
{
    return $query->whereNotNull('exit_time');
}
}