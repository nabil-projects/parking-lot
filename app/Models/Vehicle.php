<?php
// app/Models/Vehicle.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $fillable = ['license_plate', 'owner_name', 'phone', 'vehicle_type', 'color'];
    
   public function parkingRecords(): HasMany
{
    return $this->hasMany(ParkingRecord::class);
}

public function isCurrentlyParked(): bool
{
    return $this->parkingRecords()->whereNull('exit_time')->exists();
}
// app/Models/Vehicle.php

public function sessions()
{
    return $this->hasMany(ParkingSession::class);
}

}