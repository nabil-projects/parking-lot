<?php

// app/Models/ParkingSession.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSession extends Model
{
    protected $fillable = [
        'vehicle_id', 'check_in', 'check_out'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

