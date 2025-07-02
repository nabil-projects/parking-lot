<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['vehicle_id', 'action'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

